@extends('layouts.master')
@section('title', 'Edit Product')
@section('content')

<div class="container py-4">
    <h1 class="text-success mb-4">🛠️ Edit Product</h1>

    <!-- Error messages -->
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <strong>Error!</strong> {{$error}}
    </div>
    @endforeach

    <!-- Product Edit Form -->
    <form action="{{route('products_save', $product->id)}}" method="post" class="p-4 rounded shadow-sm bg-light">
        {{ csrf_field() }}
        
        <div class="row mb-2">
            <div class="col-6">
                <label for="code" class="form-label">Code:</label>
                <input type="text" class="form-control" placeholder="Product Code" name="code" required value="{{$product->code}}">
            </div>
            <div class="col-6">
                <label for="model" class="form-label">Model:</label>
                <input type="text" class="form-control" placeholder="Product Model" name="model" required value="{{$product->model}}">
            </div>
        </div>
        
        <div class="row mb-2">
            <div class="col">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" placeholder="Product Name" name="name" required value="{{$product->name}}">
            </div>
        </div>
        
        <div class="row mb-2">
            <div class="col-6">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" placeholder="Product Price" name="price" required value="{{$product->price}}">
            </div>
            <div class="col-6">
                <label for="photo" class="form-label">Photo URL:</label>
                <input type="text" class="form-control" placeholder="Product Photo" name="photo" required value="{{$product->photo}}">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" placeholder="Product Description" name="description" required>{{$product->description}}</textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success w-100">
            <i class="fas fa-save"></i> Save Changes
        </button>
    </form>
</div>

<!-- Additional Styling -->
<style>
    /* Consistent background color and container styles */
    body {
        background: linear-gradient(135deg, #c9a74e 0%, #8dbf3e 60%);
    }

    .container {
        background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent container for contrast */
        padding: 30px;
        border-radius: 10px;
    }

    h1 {
        color: #28a745;
        font-weight: bold;
    }

    .form-control {
        border-radius: 10px;
        font-size: 16px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    button {
        border-radius: 25px;
        padding: 12px 20px;
        font-size: 16px;
        transition: transform 0.3s ease, background-color 0.4s ease;
    }

    button:hover {
        transform: scale(1.05);
        background-color: #76d7c4; /* Light green */
    }
</style>

@endsection
