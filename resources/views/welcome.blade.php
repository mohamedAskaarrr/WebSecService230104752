<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Askarr Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #2196F3;
            --accent-color: #FFC107;
            --text-color: #333;
            --light-bg: #f8f9fa;
            --dark-bg: #343a40;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --card-bg: #ffffff;
            --card-shadow: 0 4px 6px rgba(0,0,0,0.1);
            --navbar-bg: #ffffff;
            --navbar-text: #333;
            --dropdown-bg: #ffffff;
            --dropdown-text: #333;
            --dropdown-hover-bg: #f8f9fa;
            --dropdown-hover-text: #4CAF50;
            --border-color: #dee2e6;
            --sidebar-bg: #A5D6A7;
            --sidebar-text: #388E3C;
            --sidebar-hover-bg: #66BB6A;
            --sidebar-hover-text: #ffffff;
            --sidebar-active-bg: #66BB6A;
            --sidebar-active-text: #ffffff;
        }

        [data-theme="dark"] {
            --primary-color: #66bb6a;
            --secondary-color: #42a5f5;
            --accent-color: #ffca28;
            --text-color: #e0e0e0;
            --light-bg: #121212;
            --dark-bg: #1e1e1e;
            --success-color: #4caf50;
            --danger-color: #f44336;
            --warning-color: #ff9800;
            --info-color: #03a9f4;
            --card-bg: #1e1e1e;
            --card-shadow: 0 4px 6px rgba(0,0,0,0.3);
            --navbar-bg: #1e1e1e;
            --navbar-text: #e0e0e0;
            --dropdown-bg: #1e1e1e;
            --dropdown-text: #e0e0e0;
            --dropdown-hover-bg: #2d2d2d;
            --dropdown-hover-text: #66bb6a;
            --border-color: #333;
            --sidebar-bg: #1e3a1e;
            --sidebar-text: #a5d6a7;
            --sidebar-hover-bg: #2d5a2d;
            --sidebar-hover-text: #ffffff;
            --sidebar-active-bg: #2d5a2d;
            --sidebar-active-text: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: var(--sidebar-bg);
            padding-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 4px 0px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar .nav-link {
            font-size: 18px;
            padding: 10px 15px;
            color: var(--sidebar-text);
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar .nav-link:hover {
            background-color: var(--sidebar-hover-bg);
            color: var(--sidebar-hover-text);
        }
        .sidebar .nav-link i {
            color: var(--sidebar-text);
        }
        .sidebar .nav-link:hover i {
            color: var(--sidebar-hover-text);
        }
        .sidebar .nav-item.active {
            background-color: var(--sidebar-active-bg);
            color: var(--sidebar-active-text);
        }
        .sidebar .nav-item.active i {
            color: var(--sidebar-active-text);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        .profile-header {
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: 8px;
            box-shadow: var(--card-shadow);
        }
        .profile-header h4 {
            font-weight: bold;
            color: var(--text-color);
        }
        .profile-table td, .profile-table th {
            vertical-align: middle;
            color: var(--text-color);
        }

        .navbar {
            background-color: var(--navbar-bg) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar .nav-link {
            color: var(--navbar-text) !important;
        }

        .dropdown-menu {
            background-color: var(--dropdown-bg);
            border: none;
            box-shadow: var(--card-shadow);
        }

        .dropdown-item {
            color: var(--dropdown-text);
        }

        .dropdown-item:hover {
            background-color: var(--dropdown-hover-bg);
            color: var(--dropdown-hover-text);
        }

        .card {
            background-color: var(--card-bg);
            border: none;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0,0,0,0.15);
        }

        .card-body h4 {
            color: var(--primary-color);
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
        <nav class="navbar navbar-expand-sm">
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
                            <li>
                                <a class="dropdown-item" href="#" id="darkModeToggle">
                                    <i class="fas fa-moon me-2"></i>Dark Mode
                                </a>
                            </li>
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

        <div class="card m-4" data-aos="fade-up">
            <div class="card-body">
                <h4 aria-flowto="0">Welcome to Home Page!</h4>
                <p>This is the home page of Askarr Store. Browse our products and enjoy your shopping experience.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Dark mode functionality
            const darkModeToggle = document.getElementById('darkModeToggle');
            const htmlElement = document.documentElement;
            
            // Check for saved theme preference
            const savedTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-theme', savedTheme);
            
            // Update icon based on current theme
            updateDarkModeIcon(savedTheme);
            
            // Toggle dark mode
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const currentTheme = htmlElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                    
                    htmlElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                    
                    updateDarkModeIcon(newTheme);
                });
            }
            
            // Update dark mode icon
            function updateDarkModeIcon(theme) {
                if (darkModeToggle) {
                    const icon = darkModeToggle.querySelector('i');
                    if (theme === 'dark') {
                        icon.classList.remove('fa-moon');
                        icon.classList.add('fa-sun');
                        darkModeToggle.innerHTML = '<i class="fas fa-sun me-2"></i>Light Mode';
                    } else {
                        icon.classList.remove('fa-sun');
                        icon.classList.add('fa-moon');
                        darkModeToggle.innerHTML = '<i class="fas fa-moon me-2"></i>Dark Mode';
                    }
                }
            }
        });
    </script>
</body>
</html>








































