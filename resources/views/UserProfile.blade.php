<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('layouts.menu') <!-- Assuming you have a layout file named 'app.blade.php' -->
    
    @section('content')
    <div class="container">
        <h2 class="text-center mt-4">User Profile</h2>
        
        <div class="card mx-auto mt-4" style="max-width: 500px;">
            <div class="card-body">
                <h4 class="card-title text-center">Welcome, {{ auth()->user()->name ?? 'Guest' }}!</h4>
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Email:</strong> {{ auth()->user()->email ?? 'Not Available' }}</li>
                    <li class="list-group-item"><strong>Name:</strong> {{ auth()->user()->name ?? 'Not Available' }}</li>
                    <li class="list-group-item"><strong>Role:</strong> {{ auth()->user()->role ?? 'User' }}</li>
              </ul>
                
                <div class="text-center mt-3">
                    @auth
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    @endsection

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>