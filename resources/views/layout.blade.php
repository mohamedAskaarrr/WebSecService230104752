<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Position the button in the upper right corner */
        .register-button {
            position: fixed; /* or 'absolute' if you want it relative to the page */
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
    </style>

</head>
<body>
<div class="container d-flex flex-column align-items-center mt-4">

    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
        </li>
 
        <li class="nav-item">
            <a class="nav-link {{ request()->is('grades') ? 'active' : '' }}" href="{{ url('/grades') }}">Grades</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('/products/index') }}">Users</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('/products') }}">show online store</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('/product') }}">Products management</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('permissions') ? 'active' : '' }}" href="{{ url('/permission/index') }}">Permissoins</a>
        </li>
       

    </ul>

    <div class="d-flex mt-2">
        <a class="register-button me-2" href="./users/UserProfile" style="right: 120px;;">Profile</a>
        <a class="register-button" href="./register">Logout</a>
    </div>




</div>


    <div class="mt-3"> 



    
        <div class="card card-body">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>