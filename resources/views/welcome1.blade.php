<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styling */
        body {
            background-color: #f4f4f4;
        }
        
        .navbar {
            background-color: #343a40; /* Dark theme */
            padding: 15px;
        }

        .navbar-nav .nav-link {
            color: white;
            font-size: 18px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .navbar-nav .active {
            background-color: #007bff;
            border-radius: 5px;
        }

        .container {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    
  @extends('layout')    
  <!-- @extends('UserProfile') -->

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            

                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container">
       <div class="container">
        <h1 class="welcome-msg">hey {{ auth()->user()->name ?? 'Guest' }}!</h1>
        <p>Navigate using the menu above.</p>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
