<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-sm {
            font-size: 0.875rem;
        }
        .basket-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Product List</h2>
                <a href="{{ route('product1.create') }}" class="btn btn-success">+ Create a Product</a>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->model }}</td>
                                <td><strong>${{ number_format($product->price, 2) }}</strong></td>
                                <td><span class="badge bg-info">{{ $product->available_stock }} in stock</span></td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                               
                                <td>
                                    <img src="{{ asset('images/' . $product->photo) }}" alt="{{ $product->name }}" class="product-img">
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('product1.edit', ['product' => $product]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <!-- Delete Button -->
                                        <form method="POST" action="{{ route('product1.destroy', ['product' => $product]) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <!-- Buy Button -->
                                        <form method="GET" action="{{ route('product1.buy', ['product' => $product]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Buy</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Basket Button -->
            <div class="basket-btn">
                <a href="{{ url('product1/Basket') }}" class="btn btn-primary">🛒 View Basket</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
