@extends("layouts.master2")
@section("title", "Login - OneHitPoint")
@section("content")
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <i class="fas fa-gamepad me-2"></i>OneHitPoint
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('WebAuthentication.index') }}">
            <i class="fas fa-home me-1"></i>Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-cogs me-1"></i>Services
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-list me-1"></i>Dropdown
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"><i class="fas fa-bolt me-2"></i>Action</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-star me-2"></i>Another Action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-ellipsis-h me-2"></i>Something Else</a></li>
          </ul>
        </li>
      </ul>

      <div class="d-flex gap-2">
        <a href="{{ route('WebAuthentication.login') }}" class="btn btn-outline-light px-4 active">
          <i class="fas fa-sign-in-alt me-2"></i>Login
        </a>
        <a href="{{ route('WebAuthentication.register') }}" class="btn btn-primary px-4">
          <i class="fas fa-user-plus me-2"></i>Register
        </a>
      </div>
    </div>
  </div>
</nav>

<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #f8f9fa;">
    <div class="card shadow-lg p-4" style="width: 350px; border-radius: 15px;">
        <h3 class="text-center mb-4"><i class="fas fa-sign-in-alt me-2"></i>Login</h3>
        <form action="{{ route('WebAuthentication.doLogin') }}" method="POST">
        {{ csrf_field() }}
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">
              <i class="fas fa-exclamation-circle me-2"></i>{{$error}}
            </div>
            @endforeach
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock me-2"></i>Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-sign-in-alt me-2"></i>Login
                </button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <p class="text-muted">Don't have an account?</p>
            <a href="{{ route('WebAuthentication.register') }}" class="btn btn-outline-secondary">
              <i class="fas fa-user-plus me-2"></i>Register
            </a>
        </div>
    </div>
</div>
@endsection