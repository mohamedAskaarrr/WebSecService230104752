<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
@extends('layouts.master')
@section('title', 'Products')
@section('content')
<div class="container py-4">
    <div class="row align-items-center mb-3">
        <div class="col-md-10">
            <h1 class="text-success">🛍️ Products</h1>
        </div>
        <div class="col-md-2">
            @can('add_products')
            <a href="{{ route('products_edit') }}" class="btn btn-success w-100">
                <i class="fas fa-plus-circle"></i> Add Product
            </a>
            @endcan
        </div>
    </div>

    <form class="mb-4 p-3 rounded shadow-sm bg-light">
        <div class="row g-2">
            <div class="col-sm-2">
                <input name="keywords" type="text" class="form-control" placeholder="Search Keywords" value="{{ request()->keywords }}" />
            </div>
            <div class="col-sm-2">
                <input name="min_price" type="number" class="form-control" placeholder="Min Price" value="{{ request()->min_price }}" />
            </div>
            <div class="col-sm-2">
                <input name="max_price" type="number" class="form-control" placeholder="Max Price" value="{{ request()->max_price }}" />
            </div>
            <div class="col-sm-2">
                <select name="order_by" class="form-select">
                    <option value="" disabled {{ request()->order_by == '' ? 'selected' : '' }}>Order By</option>
                    <option value="name" {{ request()->order_by == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="price" {{ request()->order_by == 'price' ? 'selected' : '' }}>Price</option>
                </select>
            </div>
            <div class="col-sm-2">
                <select name="order_direction" class="form-select">
                    <option value="" disabled {{ request()->order_direction == '' ? 'selected' : '' }}>Order Direction</option>
                    <option value="ASC" {{ request()->order_direction == 'ASC' ? 'selected' : '' }}>ASC</option>
                    <option value="DESC" {{ request()->order_direction == 'DESC' ? 'selected' : '' }}>DESC</option>
                </select>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-success w-100">
                    <i class="fas fa-search"></i> Go
                </button>
            </div>
            <div class="col-sm-1">
                <a href="{{ route('products_list') }}" class="btn btn-outline-danger w-100">
                    <i class="fas fa-undo"></i> Reset
                </a>
            </div>
        </div>
    </form>

    @foreach($products as $product)
    <div class="card shadow-sm mb-4 border-0 rounded-lg product-card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <img src="{{ asset('images/' . $product->photo) }}" class="img-fluid rounded shadow-sm product-img" alt="{{ $product->name }}">
                </div>
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="text-primary">{{ $product->name }}</h3>
                        <div class="d-flex gap-2">
                            @can('edit_products')
                            <a href="{{ route('products_edit', $product->id) }}" class="btn btn-outline-success">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            @endcan
                            @can('delete_products')
                            <a href="{{ route('products_delete', $product->id) }}" class="btn btn-outline-danger">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                            @endcan
                        </div>
                    </div>
                    <table class="table table-bordered table-sm">
                        <tr><th>Name</th><td>{{ $product->name }}</td></tr>
                        <tr><th>Model</th><td>{{ $product->model }}</td></tr>
                        <tr><th>Code</th><td>{{ $product->code }}</td></tr>
                        <tr><th>Price</th><td>${{ $product->price }}</td></tr>
                        <tr><th>Description</th><td>{{ $product->description }}</td></tr>
                        <tr><th>Stock</th><td>{{ $product->available_stock }}</td></tr>
                    </table>

                    @if($product->available_stock > 0)
                    <form action="{{ route('products.addTobasket', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            🧺 Add To Basket
                        </button>
                    </form>
                    @else
                    <button class="btn btn-secondary" disabled>Out of Stock</button>
                    @endif

                    @if(session('warning'))
                    <div class="alert alert-warning mt-3">{{ session('warning') }}</div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
    .text-primary {
        color: #007bff;
    }

    .product-card {
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: scale(1.03);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
    }

    .product-img {
        border-radius: 10px;
        object-fit: cover;
        height: 100%;
        transition: transform 0.3s ease;
    }

    .product-img:hover {
        transform: scale(1.05);
    }

    .btn-outline-success, .btn-outline-danger, .btn-success {
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 14px;
        transition: background-color 0.4s ease, transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-success:hover, .btn-outline-danger:hover, .btn-success:hover {
        transform: scale(1.05);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        background-color: #28a745; /* Light green */
        color: white;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545; /* Light red */
        color: white;
    }

    .btn-success {
        background: linear-gradient(45deg, #28a745, #76d7c4);
        color: white;
    }

    .container {
        background-color: #f4f4f4; /* light background */
    }
</style>

@endsection
</body>
</html>
