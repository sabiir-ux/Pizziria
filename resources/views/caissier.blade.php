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
    </style>
</head>

<body>
    <div class="dashboard-container">
        <!-- Product Management Section -->
        <div class="section">
            <h2>Produits & Stock Management</h2>
            
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
    </div>
</body>
</html>
