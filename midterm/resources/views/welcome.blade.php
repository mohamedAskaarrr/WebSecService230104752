<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Soft Background Colors */
        body {
            background-color: #f8f4e3; /* Off-white/beige background */
            font-family: 'Arial', sans-serif;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #e8dcc2; /* Soft beige */
            padding: 15px;
            border-bottom: 3px solid #d4c1a3; /* Subtle border */
        }

        /* Logout Button Positioned Upper-Left */
        .logout-btn {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #e74c3c; /* Soft Red */
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #c0392b;
            transform: scale(1.1);
        }

        /* Animated Buttons */
        .nav-link {
            color: #6a5d4d !important;
            font-size: 18px;
            transition: 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #2c3e50 !important;
            transform: translateY(-2px);
        }

        /* Center Content */
        .container {
            margin-top: 100px;
            text-align: center;
        }

        /* Welcome Message */
        .welcome-msg {
            font-size: 24px;
            font-weight: bold;
            color: #6a5d4d;
        }

    </style>
</head>
<body>

    <!-- Logout Button at Upper-Left -->
   
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout34</button>
    </form>
    

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href='./register'>Register</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./even">Even Numbers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./minitest">Minitest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./create">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./products/index">Current Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./exam/main">Exam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./grades">Grades</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Centered Content -->
    <div class="container">
        <h1 class="welcome-msg">Welcome, {{ auth()->user()->name ?? 'Guest' }}!</h1>
        <p>Navigate using the menu above.</p>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
