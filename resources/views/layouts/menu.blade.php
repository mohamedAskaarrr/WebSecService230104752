<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">
      <i class="fas fa-leaf me-2"></i>Askarr Store
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-home me-1"></i>Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/products') }}">
            <i class="fas fa-box me-1"></i>Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/about') }}">
            <i class="fas fa-info-circle me-1"></i>About
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/contact') }}">
            <i class="fas fa-envelope me-1"></i>Contact
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">
              <i class="fas fa-sign-in-alt me-1"></i>Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/register') }}">
              <i class="fas fa-user-plus me-1"></i>Register
            </a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="{{ url('/profile') }}">
                  <i class="fas fa-id-card me-2"></i>Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('/settings') }}">
                  <i class="fas fa-cog me-2"></i>Settings
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#" id="darkModeToggle">
                  <i class="fas fa-moon me-2"></i>Dark Mode
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
    
</body>
</html>