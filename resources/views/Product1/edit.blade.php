<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>


        @endif
    </div>
    <form method="post" action="{{route('product1.update', ['product' => $product])}}">
        @csrf 
        @method('put')
        <div>
            <label>Code</label> 
            <input type="text" name="code" placeholder="Code" value="{{$product->code}}" />
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}" />
        </div>
        <div>
            <label>Model</label>
            <input type="text" name="model  " placeholder="Model" value="{{$product->model}}" />
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}" />
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}" />
        </div>
        <div>
            <label>Photo</label>
            <input type="file" name="photo" placeholder="Photo" value="{{$product->photo}}" />
        </div>  
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>