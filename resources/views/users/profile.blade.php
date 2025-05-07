<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    
    <!-- Link to the Favicon -->
    <link rel="icon" href="{{ asset('images/4.jpeg/') }}" type="image/svg+xml">
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>

@extends('layouts.master')
@section('title', 'User Profile')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card profile-card" data-aos="fade-right">
                <div class="card-body text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile" class="rounded-circle mb-3" width="120">
                    <h4 class="mb-3">{{ $user->name }}</h4>
                    <p class="text-muted mb-1">{{ $user->email }}</p>
                    <div class="mt-3">
                        @foreach($user->roles as $role)
                        <span class="badge bg-primary m-1">{{ $role->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" data-aos="fade-left">
                <div class="card-body">
                    <h5 class="card-title mb-4">User Information</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th width="200">Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Roles</th>
                                <td>
                                    @foreach($user->roles as $role)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Permissions</th>
                                <td>
                                    @foreach($permissions as $permission)
                                    <span class="badge bg-info">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('users_edit', $user->id) }}" class="btn btn-primary me-2">
                            <i class="fas fa-edit"></i> Edit Profile
                            @method('PUT')
                        </a>
                        <a href="{{ route('edit_password', $user->id) }}" class="btn btn-warning">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .profile-card {
        background-color: var(--card-bg);
        border: none;
        box-shadow: var(--card-shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }

    .table {
        background-color: var(--card-bg);
        color: var(--text-color);
    }

    .table th {
        background-color: var(--dark-bg);
        color: var(--text-color);
        border-bottom: 2px solid var(--border-color);
    }

    .table td {
        border-color: var(--border-color);
    }

    .badge {
        transition: all 0.3s ease;
    }

    .text-muted {
        color: var(--text-color) !important;
        opacity: 0.7;
    }

    .btn {
        border-radius: 6px;
        padding: 8px 16px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-title {
        color: var(--primary-color);
        font-weight: 600;
    }
</style>
@endsection

</body>
</html>