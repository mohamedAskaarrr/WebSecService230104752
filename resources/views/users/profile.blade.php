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
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card shadow-lg" style="background-color: #fffef5; border-radius: 15px;">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <h4 class="mb-0">
                    <i class="fas fa-user-circle me-2"></i> User Profile
                </h4>
                <a href="{{ route('products.basket') }}" class="btn btn-warning text-dark fw-bold">
                    <i class="fas fa-shopping-basket me-1"></i> View Basket
                </a>
            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th><i class="fas fa-user me-2 text-success"></i>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    
                    <tr>
                        <th><i class="fas fa-envelope me-2 text-success"></i>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-user-tag me-2 text-success"></i>Roles</th>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-key me-2 text-success"></i>Permissions</th>
                        <td>
                            @foreach($permissions as $permission)
                                <span class="badge bg-success">{{ $permission->display_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-wallet me-2 text-success"></i>Credit</th>
                        <td><span class="fw-bold text-warning">${{ $user->credit }}</span></td>
                    </tr>
                  
                </table>

                <div class="d-flex justify-content-end gap-3">
                    @if(auth()->user()->hasPermissionTo('admin_users') || auth()->id() == $user->id)
                        <a class="btn btn-outline-primary" href='{{ route('edit_password', $user->id) }}'>
                            <i class="fas fa-lock me-1"></i> Change Password
                        </a>
                    @endif

                    @if(auth()->user()->hasPermissionTo('edit_users') || auth()->id() == $user->id)
                        <a href="{{ route('users_edit', $user->id) }}" class="btn btn-success">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



</body>
</html>