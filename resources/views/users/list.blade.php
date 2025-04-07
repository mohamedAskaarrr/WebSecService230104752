@extends('layouts.master')

@section('title', 'Users')

@section('content')

<div class="row mt-4">
    <div class="col col-12">
        <h1 class="text-success">Users</h1>
    </div>
</div>

<form>
    <div class="row mb-4">
        <div class="col col-sm-4">
            <input name="keywords" type="text" class="form-control" placeholder="Search Keywords" value="{{ request()->keywords }}" />
        </div>
        <div class="col col-sm-2">
            <button type="submit" class="btn btn-success w-100">Search</button>
        </div>
        <div class="col col-sm-2">
            <button type="reset" class="btn btn-danger w-100">Reset</button>
        </div>
    </div>
</form>

<div class="card mt-4 shadow-sm rounded">
  <div class="card-body">
    <table class="table table-striped table-bordered table-hover text-center">
      <thead class="table-success">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Roles</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @foreach($user->roles as $role)
              <span class="badge bg-primary">{{ $role->name }}</span>
            @endforeach
          </td>
          <td>
            @can('edit_users')
              <a class="btn btn-primary btn-sm" href="{{ route('users_edit', [$user->id]) }}">Edit</a>
            @endcan
            @can('admin_users')
              <a class="btn btn-warning btn-sm" href="{{ route('edit_password', [$user->id]) }}">Change Password</a>
            @endcan
            @can('delete_users')
              <a class="btn btn-danger btn-sm" href="{{ route('users_delete', [$user->id]) }}" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
            @endcan
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

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
