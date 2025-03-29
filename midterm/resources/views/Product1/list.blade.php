<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Product List</h1>
        
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('product1.create') }}" class="btn btn-primary">Create a Product</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Available Stock</th>
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
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->available_stock }} in stock</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" width="100">
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    @can('edit')
                                        <a href="{{ route('product1.edit', ['product' => $product]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @endcan
                                    
                                    <form method="post" action="{{ route('product1.destroy', ['product' => $product]) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf 
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>

                                    <td>
                            <form method="GET" action="{{ route('product1.buy', ['product' => $product]) }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Buy</button>
                            </form>
                        </td>                </div>
                            </td>

                        </tr>

                        <div class="mb-3 text-end">
                                <a href="{{ url('product1/Basket') }}" class="btn btn-primary">Basket</a>
                            </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
