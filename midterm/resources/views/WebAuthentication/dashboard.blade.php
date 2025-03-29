@extends("layouts.master2")
@section("title", "User Management")
@section("content")
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('WebAuthentication.index') }}">
      <i class="fas fa-gamepad me-2"></i>OneHitPoint
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('WebAuthentication.index') }}">
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

      <!-- User Menu -->
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

<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">User Management</h5>
            <a href="{{ route('WebAuthentication.createUser') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i>Add New User
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('WebAuthentication.editUser', $user->id) }}" class="btn btn-sm btn-warning me-1" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('WebAuthentication.deleteUser', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')" title="Delete User">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No users found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection