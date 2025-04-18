<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #A5D6A7; /* Soft Green background */
            padding-top: 20px;
            transition: all 0.3s ease; /* Animation for sidebar transition */
            box-shadow: 4px 0px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar .nav-link {
            font-size: 18px;
            padding: 10px 15px;
            color: #388E3C; /* Green text */
            transition: background-color 0.3s, color 0.3s; /* Animation for text and background on hover */
        }
        .sidebar .nav-link:hover {
            background-color: #66BB6A; /* Darker green background on hover */
            color: #fff; /* White text on hover */
        }
        .sidebar .nav-link i {
            color: #388E3C; /* Green color for icons */
        }
        .sidebar .nav-link:hover i {
            color: #fff; /* White icons when hovered */
        }
        .sidebar .nav-item.active {
            background-color: #66BB6A; /* Slightly darker green for active item */
            color: white;
        }
        .sidebar .nav-item.active i {
            color: white;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        .profile-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-header h4 {
            font-weight: bold;
        }
        .profile-table td, .profile-table th {
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="./">
                    <i class="bi bi-house-door me-2"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./even">
                    <i class="bi bi-sort-numeric-up me-2"></i> Even Numbers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./prime">
                    <i class="bi bi-lightning-charge me-2"></i> Prime Numbers
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="./multable">
                    <i class="bi bi-math me-2"></i> Multiplication Table
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('products_list')}}">
                    <i class="bi bi-box me-2"></i> Products
                </a>
            </li>
            @can('show_users')
            <li class="nav-item">
                <a class="nav-link" href="{{route('users')}}">
                    <i class="bi bi-person-lines-fill me-2"></i> Users
                </a>
            </li>
            @endcan
            <!-- Dropdown menu example -->
           
            <!-- Basket link -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('products.basket') }}">
                    <i class="bi bi-cart4 me-2"></i> Basket
                </a>
            </li> -->
        </ul>

        <!-- Authentication Section -->
        <ul class="navbar-nav mt-3">
            @auth
           
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                    <i class="bi bi-person-add me-2"></i> Register
                </a>
            </li>
            @endauth
        </ul>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <!-- Navbar with user profile -->
        <nav class="navbar navbar-expand-sm bg-light">
            <div class="container-fluid">
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
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li> -->
                    @endauth
                </ul>
            </div>
        </nav>

        <div class="card m-4">
      <div class="card-body">
        <h4 aria-flowto="0" style="color:rgb(97, 134, 98);"> Welcome to Home Page !</h4>
        
      </div>
    </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>








































