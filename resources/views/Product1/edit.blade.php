<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-warning text-dark">
                <h2 class="text-center">Edit Product</h2>
            </div>
            <div class="card-body">
                <!-- Display Errors -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('product1.update', ['product' => $product]) }}" enctype="multipart/form-data">
                    @csrf 
                    @method('put')

                    <div class="mb-3">
                        <label class="form-label">Code</label> 
                        <input type="text" name="code" class="form-control" placeholder="Enter product code" value="{{ $product->code }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name" value="{{ $product->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Model</label>
                        <input type="text" name="model" class="form-control" placeholder="Enter model" value="{{ $product->model }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter price" value="{{ $product->price }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Photo</label>
                        <div>
                            <img src="{{ asset('public/images/' . $product->photo) }}" alt="{{ $product->name }}" width="100" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload New Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
