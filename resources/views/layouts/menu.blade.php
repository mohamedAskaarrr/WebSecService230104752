<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./even">Even Numbers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./prime">Prime Numbers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./multable">Multiplication Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('products_list')}}">Products</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('products.basket')}}">List Purchase</a>
            </li>

            @can('show_users')
            <li class="nav-item">
                <a class="nav-link" href="{{route('users')}}">Users</a>
            </li>
            @endcan
        </ul>
        <ul class="navbar-nav">
            @auth
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="navbarProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile" width="30" height="30" class="rounded-circle">
        <span>{{ auth()->user()->name }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarProfile">
        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="{{ route('do_logout') }}">Logout</a></li>
    </ul>
</li>

            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>

            <!-- داخل الـ navbar -->
       

            @endauth
            <!-- داخل الـ navbar -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.basket') }}">
                    <i class="bi bi-cart4"></i> Basket
                </a>
            </li>

        </ul>
    </div>
</nav>
    
</body>
</html>