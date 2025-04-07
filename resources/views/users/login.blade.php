@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="d-flex justify-content-center">
  <div class="card m-4 col-sm-6 shadow-sm rounded">
    <div class="card-body">
      <h3 class="text-center mb-4"><i class="bi bi-person-lock"></i> Login</h3>
      
      <form action="{{route('do_login')}}" method="post">
        {{ csrf_field() }}
        
        <!-- Error messages -->
        <div class="form-group">
          @foreach($errors->all() as $error)
            <div class="alert alert-danger">
              <strong>Error!</strong> {{$error}}
            </div>
          @endforeach
        </div>

        <!-- Email Field -->
        <div class="form-group mb-3">
          <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email:</label>
          <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
        </div>

        <!-- Password Field -->
        <div class="form-group mb-3">
          <label for="password" class="form-label"><i class="bi bi-key"></i> Password:</label>
          <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
        </div>

        <!-- Submit Button -->
        <div class="form-group mb-2">
          <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-box-arrow-in-right"></i> Login</button>
        </div>
      </form>
      
      <div class="text-center mt-3">
        <small>Don't have an account? <a href="{{ route('register') }}">Register here</a></small>
      </div>
    </div>
  </div>
</div>
@endsection

@section('head')
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Include FontAwesome Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Arial', sans-serif;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 30px;
    }

    .form-control {
      border-radius: 25px;
      box-shadow: none;
    }

    .btn {
      border-radius: 25px;
      padding: 10px 20px;
    }

    .alert-danger {
      font-size: 14px;
    }

    .form-group i {
      margin-right: 10px;
    }

    .text-center a {
      text-decoration: none;
      color: #007bff;
    }

    .text-center a:hover {
      text-decoration: underline;
    }
  </style>
@endsection
