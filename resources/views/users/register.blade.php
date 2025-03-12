<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Soft Background Colors */
        body {
            background-color: #f8f4e3; /* Off-white/beige background */
            font-family: 'Arial', sans-serif;
        }

        /* Card Styling */
        .card {
            background: #fffaf0; /* Soft cream */
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        /* Form Input Styling */
        .form-control {
            border-radius: 5px;
            border: 1px solid #d4c1a3;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Error Message Styling */
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            border-radius: 5px;
        }

        /* Animated Button */
        .btn-animated {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .btn-animated:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <!-- Error Messages -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{ route('do_register') }}" method="POST">
                            @csrf
                            @method('POST')
                            

                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-animated">Register</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href='./login' class="btn btn-outline-secondary w-100">Already have an account? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
