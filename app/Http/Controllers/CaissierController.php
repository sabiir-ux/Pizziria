<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaissierController extends Controller
{
    /**
     * Display the caissier dashboard
     */
    public function index()
    {
        $products = Product::orderBy('name')->get();
        $pendingOrders = Order::whereIn('status', ['pending', 'processing'])
                             ->orderBy('created_at', 'desc')
                             ->get();
        
        return view('caissier', compact('products', 'pendingOrders'));
    }

    /**
     * Update product stock quantity
     */
    public function updateStock(Request $request, Product $product)
    {
        $request->validate([
            'stock_quantity' => 'required|integer|min:0'
        ]);

        try {
            $product->update([
                'stock_quantity' => $request->stock_quantity
            ]);

            return redirect()->back()->with('success', 'Stock updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update stock');
        }
    }

    /**
     * Show all orders with optional filtering
     */
    public function orders(Request $request)
    {
        $status = $request->get('status');
        
        $query = Order::query();
        
        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }
        
        $orders = $query->orderBy('created_at', 'desc')->get();
        
        if ($request->ajax()) {
            return response()->json($orders);
        }
        
        return view('caissier.orders', compact('orders'));
    }

    /**
     * Update order status
     */
    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        try {
            DB::beginTransaction();
            
            $order->update([
                'status' => $request->status
            ]);

            // If order is cancelled, restore the stock
            if ($request->status === 'cancelled') {
                $products = json_decode($order->products, true);
                foreach ($products as $orderProduct) {
                    $product = Product::find($orderProduct['id']);
                    if ($product) {
                        $product->increment('stock_quantity', $orderProduct['quantity']);
                    }
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Order status updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update order status');
        }
    }

    /**
     * Search products
     */
    public function searchProducts(Request $request)
    {
        $query = $request->get('query');
        
        $products = Product::where('name', 'LIKE', "%{$query}%")
                          ->orWhere('id', 'LIKE', "%{$query}%")
                          ->get();
                          
        return response()->json($products);
    }

    /**
     * Get low stock products
     */
    public function getLowStockProducts()
    {
        $products = Product::where('stock_quantity', '<', 10)
                          ->orderBy('stock_quantity')
                          ->get();
                          
        return response()->json($products);
    }

    /**
     * Show order details
     */
    public function showOrderDetails(Order $order)
    {
        return view('caissier.order-details', compact('order'));
    }

    /**
     * Get order statistics
     */
    public function getOrderStats()
    {
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'processing_orders' => Order::where('status', 'processing')->count(),
            'completed_orders' => Order::where('status', 'completed')->count(),
            'cancelled_orders' => Order::where('status', 'cancelled')->count(),
            'today_orders' => Order::whereDate('created_at', today())->count(),
            'today_revenue' => Order::whereDate('created_at', today())
                                  ->where('status', '!=', 'cancelled')
                                  ->sum('total_amount')
        ];

        return response()->json($stats);
    }

    /**
     * Create a new order
     */
    public function createOrder(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1'
        ]);

        try {
            DB::beginTransaction();

            $total = 0;
            $orderProducts = [];

            foreach ($request->products as $product) {
                $dbProduct = Product::find($product['id']);
                
                if ($dbProduct->stock_quantity < $product['quantity']) {
                    throw new \Exception("Insufficient stock for product: {$dbProduct->name}");
                }

                $dbProduct->decrement('stock_quantity', $product['quantity']);
                
                $orderProducts[] = [
                    'id' => $dbProduct->id,
                    'name' => $dbProduct->name,
                    'quantity' => $product['quantity'],
                    'price' => $dbProduct->price
                ];

                $total += $dbProduct->price * $product['quantity'];
            }

            $order = Order::create([
                'order_number' => 'ORD-' . uniqid(),
                'products' => json_encode($orderProducts),
                'total_amount' => $total,
                'status' => 'pending'
            ]);

            DB::commit();
            return response()->json(['message' => 'Order created successfully', 'order' => $order]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}