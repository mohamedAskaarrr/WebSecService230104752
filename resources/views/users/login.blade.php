<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form container styling */
        form {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Form group styling */
        .form-group {
            margin-bottom: 1rem;
        }

        /* Label styling */
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }

        /* Input field styling */
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(72, 207, 173, 0.5);
        }

        /* Button styling */
        .btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Error message styling */
        .alert {
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="{{ route('do_login') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>Error!</strong> {{ $error }}
                </div>
            @endforeach
        </div>
        <div class="form-group mb-2">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-group mb-2">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</body>
</html>