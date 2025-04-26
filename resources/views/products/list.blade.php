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
            <h1 >🛍️ Products</h1>
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
    <div class="card shadow-sm mb-4 border-0 rounded-lg product-card" data-aos="fade-up">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <img src="{{ asset('images/' . $product->photo) }}" class="img-fluid rounded shadow-sm product-img" alt="{{ $product->name }}">
                </div>
                <div class="col-lg-8 product-details-box">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="product-title">{{ $product->name }}</h3>
        <div class="d-flex gap-2">
            @can('edit_products')
            <a href="{{ route('products_edit', $product->id) }}" class="btn btn-outline-light btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
            @endcan
            @can('delete_products')
            <a href="{{ route('products_delete', $product->id) }}" class="btn btn-outline-danger btn-sm">
                <i class="fas fa-trash-alt"></i> Delete
            </a>
            @endcan
        </div>
    </div>

    <table class="table table-sm table-borderless text-light">
        <tr><th>Name</th><td>{{ $product->name }}</td></tr>
        <tr><th>Model</th><td>{{ $product->model }}</td></tr>
        <tr><th>Code</th><td>{{ $product->code }}</td></tr>
        <tr><th>Price</th><td>${{ $product->price }}</td></tr>
        <tr><th>Description</th><td>{{ $product->description }}</td></tr>
        <tr><th>Stock</th><td>{{ $product->available_stock }}</td></tr>

                        <!-- <form action="{{ route('products.addstock', $product->id) }}" method="POST"> -->
                        @csrf
                        <div class="col-6">
                <!-- <label for="price" class="form-label">add:</label>
                <input type="number" class="form-control" placeholder="Product Price" name="price" required value="{{$product->stock}}">
            </div> -->

                   @role('Employee')            
            <form action="{{ route('products.addstock', $product->id) }}" method="POST">
            @csrf
                    <div class="input-group">
                        <input type="number" class="form-control" name="stock" placeholder="Enter Stock  Amount" >
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add stock
                        </button>
                    </div>
                </form>

                
               @endrole
            
           
                        

                    </table>

                    @if($product->available_stock > 0)
                    <form action="{{ route('products.addTobasket', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            Buy
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
    :root {
        --primary-color: #f5f5f5; /* Light Text */
        --secondary-color: #c6a47e; /* Gold Accent */
        --card-bg: #3a2828; /* Darker than body */
        --light-bg: #2c1e1e; /* Page Background */
        --danger-color: #a94442; /* Soft Red */
        --text-color: #f5f5f5; /* Text Everywhere */
        --dark-bg: #1c1212; /* Table Headers */
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Roboto', sans-serif;
        color: var(--text-color);
    }

    h1, h3 {
        color: var(--secondary-color);
    }

    .product-card {
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        background-color: var(--card-bg);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: scale(1.03);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
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
        transition: all 0.4s ease;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        color: var(--text-color);
        border: 2px solid var(--secondary-color);
    }

    .btn-outline-success:hover, .btn-outline-danger:hover, .btn-success:hover {
        background-color: var(--secondary-color);
        color: #2c1e1e;
        transform: scale(1.05);
    }

    .btn-success {
        background: linear-gradient(45deg, var(--secondary-color), #b89b76);
        border: none;
    }

    .btn-outline-danger:hover {
        background-color: var(--danger-color);
        color: #fff;
    }

    .bg-light {
        background-color: var(--card-bg) !important;
    }

    .table {
        color: var(--text-color);
    }

    .table th {
        background-color: var(--dark-bg);
        color: var(--text-color);
    }

    .table td {
        background-color: var(--card-bg);
    }

    input.form-control, select.form-select {
        background-color: var(--card-bg);
        color: var(--text-color);
        border: 1px solid var(--secondary-color);
    }

    input.form-control::placeholder {
        color: #d6c6c6;
    }



    .product-details-box {
    background-color: #3e2c2c;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    color: #f5f5f5;
    transition: background-color 0.3s ease;
}

.product-details-box:hover {
    background-color:rgb(51, 36, 36);
}

.product-title {
    color: #fdd9a0;
    font-weight: 600;
}

.table th {
    width: 30%;
    color:rgb(101, 76, 76);
}

.table td {
    color: #ffffff;
}

.btn-outline-light {
    border-color: #cccccc;
    color: #cccccc;
}

.btn-outline-light:hover {
    background-color:rgba(197, 48, 48, 0.06);
    color: #ffffff;
}

</style>


@endsection
</body>
</html>
