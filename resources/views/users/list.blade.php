@extends('layouts.master')

@section('title', 'Users List')

@section('content')

<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="text-primary"><i class="fas fa-users me-2"></i>Users List</h2>
        </div>
        <div class="col-md-6 text-end">
            <form action="{{ route('users') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="keywords" class="form-control" placeholder="Search users..." value="{{ request()->keywords }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                        <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('profile', $user->id) }}" class="btn btn-sm btn-info me-2">
                                <i class="fas fa-eye"></i> View
                            </a>
                            @can('edit_users')
                            <a href="{{ route('users_edit', $user->id) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            @endcan
                            @can('delete_users')
                            <a href="{{ route('users_delete', $user->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .table {
        background-color: var(--card-bg);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
    }

    .table thead th {
        background-color: var(--dark-bg);
        color: var(--text-color);
        border-bottom: 2px solid var(--border-color);
    }

    .table tbody tr {
        border-bottom: 1px solid var(--border-color);
        color: var(--text-color);
    }

    .table tbody tr:hover {
        background-color: var(--dropdown-hover-bg);
    }

    .badge {
        transition: background-color 0.3s ease;
    }

    .form-control {
        background-color: var(--card-bg);
        border-color: var(--border-color);
        color: var(--text-color);
    }

    .form-control:focus {
        background-color: var(--card-bg);
        border-color: var(--primary-color);
        color: var(--text-color);
        box-shadow: 0 0 0 0.25rem rgba(var(--primary-color), 0.25);
    }

    .btn-group .btn {
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .text-primary {
        color: var(--primary-color) !important;
    }
</style>

@endsection

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        /* Overall body and page style */
        body {
            background-color: #f8f9fa; /* Light background for the whole page */
            font-family: 'Arial', sans-serif;
        }

        .container {
            padding: 30px;
        }

        /* Card styling */
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #28a745;
            color: white;
            padding: 15px;
            border-radius: 8px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: center;
            font-size: 16px;
        }

        table th {
            background-color: #28a745;
            color: white;
        }

        table td {
            background-color: #f8f9fa;
        }

        table tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        /* Button hover effects */
        .btn-primary:hover, .btn-warning:hover, .btn-danger:hover {
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        /* Badge styling for roles */
        .badge {
            font-size: 14px;
            margin: 0 5px;
        }

        /* Search bar and button styles */
        .form-control {
            border-radius: 25px;
            box-shadow: none;
        }

        .btn-success, .btn-danger {
            border-radius: 25px;
            width: 100%;
        }

        /* Spacing adjustments */
        .row.mb-4 {
            margin-bottom: 20px;
        }
    </style>
@endsection
