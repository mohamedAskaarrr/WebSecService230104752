@extends("layouts.master2")
@section("title", "Register - OneHitPoint")
@section("content")
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <i class="fas fa-gamepad me-2"></i>OneHitPoint
    </a>
    <div class="d-flex gap-2">
      <a href="{{ route('WebAuthentication.login') }}" class="btn btn-outline-light px-4">
        <i class="fas fa-sign-in-alt me-2"></i>Login
      </a>
      <a href="{{ route('WebAuthentication.register') }}" class="btn btn-primary px-4 active">
        <i class="fas fa-user-plus me-2"></i>Register
      </a>
    </div>
  </div>
</nav>

<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #f8f9fa;">
    <div class="card shadow-lg p-4" style="width: 350px; border-radius: 15px;">
        <h3 class="text-center mb-4"><i class="fas fa-user-plus me-2"></i>Register</h3>
      
        <form action="{{ route('WebAuthentication.doRegister') }}" method="POST">
            @csrf
            
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div><i class="fas fa-exclamation-circle me-2"></i>{{$error}}</div>
                @endforeach
            </div>
            @endif

            @if($errors->has('email'))
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                Already have an account? 
                <a href="{{ route('WebAuthentication.login') }}" class="alert-link">Login</a> or 
                <a href="{{ route('WebAuthentication.forgotPassword') }}" class="alert-link">Reset Password</a>
            </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">
                    <i class="fas fa-user me-2"></i>Full Name
                </label>
                <input type="text" class="form-control" id="name" name="name" 
                    value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope me-2"></i>Email Address
                </label>
                <input type="email" class="form-control" id="email" name="email" 
                    value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="fas fa-lock me-2"></i>Password
                </label>
                <input type="password" class="form-control" id="password" 
                    name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    <i class="fas fa-lock me-2"></i>Confirm Password
                </label>
                <input type="password" class="form-control" 
                    id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-plus me-2"></i>Register
                </button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <p class="text-muted">Already have an account?</p>
            <a href="{{ route('WebAuthentication.login') }}" class="btn btn-outline-secondary">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </a>
        </div>
    </div>
</div>
@endsection
