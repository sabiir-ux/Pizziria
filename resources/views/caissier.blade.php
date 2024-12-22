<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caissier Dashboard</title>
    <style>
        /* Styling for dashboard */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 0;
        }
        
        .dashboard-container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        /* Common section style */
        .section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            min-width: 300px;
            margin-bottom: 30px;
        }

        .section h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .section table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .section table, th, td {
            border: 1px solid #ddd;
        }

        .section th, .section td {
            padding: 10px;
            text-align: left;
        }

        /* Button style */
        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #45a049;
        }

        /* Responsive for small screens */
        @media (max-width: 768px) {
            .section {
                width: 100%;
            }
        }
        .tabs {
            display: flex;
            margin-bottom: 20px;
            gap: 10px;
        }
        
        .tab {
            padding: 10px 20px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .tab.active {
            background-color: #4CAF50;
            color: white;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.9em;
        }
        
        .status-pending {
            background-color: #ffd700;
            color: black;
        }
        
        .status-processing {
            background-color: #1e90ff;
            color: white;
        }
        
        .status-completed {
            background-color: #32cd32;
            color: white;
        }
        
        .status-cancelled {
            background-color: #ff4444;
            color: white;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Tabs -->
        <div class="tabs">
            <button class="tab active" data-section="products">Products</button>
            <button class="tab" data-section="orders">Orders</button>
        </div>

        <!-- Products Section -->
        <div class="section" id="products-section">
            <h2>Products & Stock Management</h2>
            
            @if(session('success'))
                <div style="color: green; text-align: center; margin-bottom: 10px;">
                    {{ session('success') }}
                </div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Stock Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>
                            <form action="{{ route('products.updateStock', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" min="0" style="width: 80px;">
                        </td>
                        <td>
                                <button type="submit" class="button">Update Stock</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Orders Section -->
        <div class="section" id="orders-section" style="display: none;">
            <h2>Order Management</h2>
            
            <div class="tabs">
                <button class="tab active" data-status="all">All Orders</button>
                <button class="tab" data-status="pending">Pending</button>
                <button class="tab" data-status="processing">Processing</button>
                <button class="tab" data-status="completed">Completed</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Products</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="orders-tbody">
                    @foreach($pendingOrders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>
                            @foreach(json_decode($order->products) as $product)
                                {{ $product->name }} (x{{ $product->quantity }})<br>
                            @endforeach
                        </td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <span class="status-badge status-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Tab switching functionality
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const section = this.dataset.section;
                const status = this.dataset.status;
                
                if (section) {
                    // Main tab switching
                    document.querySelectorAll('[data-section]').forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    document.getElementById('products-section').style.display = section === 'products' ? 'block' : 'none';
                    document.getElementById('orders-section').style.display = section === 'orders' ? 'block' : 'none';
                } else if (status) {
                    // Order status filtering
                    document.querySelectorAll('[data-status]').forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    fetchOrders(status);
                }
            });
        });

        function fetchOrders(status) {
            fetch(`/orders?status=${status}`)
                .then(response => response.json())
                .then(orders => {
                    const tbody = document.getElementById('orders-tbody');
                    tbody.innerHTML = orders.map(order => `
                        <tr>
                            <td>${order.order_number}</td>
                            <td>${JSON.parse(order.products).map(p => `${p.name} (x${p.quantity})`).join('<br>')}</td>
                            <td>$${parseFloat(order.total_amount).toFixed(2)}</td>
                            <td>
                                <span class="status-badge status-${order.status}">
                                    ${order.status.charAt(0).toUpperCase() + order.status.slice(1)}
                                </span>
                            </td>
                            <td>
                                <form action="/orders/${order.id}/update-status" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>Pending</option>
                                        <option value="processing" ${order.status === 'processing' ? 'selected' : ''}>Processing</option>
                                        <option value="completed" ${order.status === 'completed' ? 'selected' : ''}>Completed</option>
                                        <option value="cancelled" ${order.status === 'cancelled' ? 'selected' : ''}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    `).join('');
                });
        }
    </script>
</body>
</html>