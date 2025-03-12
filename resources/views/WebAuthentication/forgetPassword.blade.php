@extends("layouts.master2")
@section("title", "Change Password - OneHitPoint")
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

      @auth
      <div class="d-flex align-items-center gap-3">
        <div class="dropdown">
          <a href="#" class="text-light text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle fs-4 me-2"></i>
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="{{ route('WebAuthentication.userAccount') }}"><i class="fas fa-user-cog me-2"></i>My Account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('WebAuthentication.doLogout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="fas fa-sign-out-alt me-2"></i>Logout
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      @endauth
    </div>
  </div>
</nav>

<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #f8f9fa;">
  <div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px;">
    <h3 class="text-center mb-4"><i class="fas fa-key me-2"></i>Reset Password</h3>
    
    @if(session('success'))
    <div class="alert alert-success">
      <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
      <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('WebAuthentication.doResetPassword') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
      </div>
      <div class="mb-3">
        <label for="new_password" class="form-label"><i class="fas fa-lock me-2"></i>New Password</label>
        <input type="password" class="form-control" id="new_password" name="new_password" required>
      </div>
      <div class="mb-3">
        <label for="new_password_confirmation" class="form-label"><i class="fas fa-lock me-2"></i>Confirm New Password</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-key me-2"></i>Reset Password
        </button>
      </div>
    </form>
  </div>
</div>
@endsection