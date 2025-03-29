@extends("layouts.master2")
@section("title", "OneHitPoint")
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
          <a class="nav-link active" href="#">
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
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">
            <i class="fas fa-ban me-1"></i>Disabled
          </a>
        </li>
      </ul>

      <!-- Login Button -->
      @auth
      <div class="d-flex align-items-center gap-3">
        <div class="dropdown">
          <a href="#" class="text-light text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle fs-4 me-2"></i>
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="userDropdown">
            @if(Auth::user()->role === 'admin')
            <li><a class="dropdown-item" href="{{ route('WebAuthentication.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            @endif
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
@endsection