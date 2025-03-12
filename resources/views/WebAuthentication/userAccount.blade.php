@extends("layouts.master2")
@section("title", "OneHitPoint")
@section("content")
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">OneHitPoint</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('WebAuthentication.index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another Action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something Else</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>

      <!-- User Menu -->
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
      @else
      <div class="d-flex gap-2">
        <a href="{{ route('WebAuthentication.login') }}" class="btn btn-outline-light px-4">
          <i class="fas fa-sign-in-alt me-2"></i>Login
        </a>
        <a href="{{ route('WebAuthentication.register') }}" class="btn btn-primary px-4">
          <i class="fas fa-user-plus me-2"></i>Register
        </a>
      </div>
      @endauth
    </div>
  </div>
</nav>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header bg-dark text-white">
          <h4 class="mb-0"><i class="fas fa-user-circle me-2"></i>My Account</h4>
        </div>
        <div class="card-body">
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif

          @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="mb-4">
            <h5>Account Information</h5>
            <p><strong>Username:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
          </div>

          <div class="mb-4">
            <h5>Update Username</h5>
            <form action="{{ route('WebAuthentication.updateUsername') }}" method="POST" class="mb-3">
              @csrf
              <div class="mb-3">
                <label for="new_username" class="form-label">New Username</label>
                <input type="text" class="form-control" id="new_username" name="new_username" required>
              </div>
              <button type="submit" class="btn btn-primary">Update Username</button>
            </form>
          </div>

          <div class="mb-4">
            <h5>Change Password</h5>
            <form action="{{ route('WebAuthentication.updatePassword') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
              </div>
              <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
              </div>
              <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
              </div>
              <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
          </div>

          <div>
            <h5>Forgot Password?</h5>
            <form action="{{ route('WebAuthentication.forgotPassword') }}" method="get">
              <button type="submit" class="btn btn-warning">Reset Password</button>
            </form>
            <small class="text-muted mt-2 d-block">
              We'll send you an email with instructions to reset your password.
            </small>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection