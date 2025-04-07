<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>

    <!-- FontAwesome Icons for use in buttons and links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Additional Styling -->
    <style>
        /* Soft Green Background */
        body {
            background: linear-gradient(135deg, #a8d08d 0%, #81c784 100%); /* Soft Green Gradient */
            font-family: 'Arial', sans-serif;
            padding-top: 20px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Transparent White for contrast */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            color: #388e3c;
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            font-size: 16px;
            padding: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #76d7c4;
            box-shadow: 0 0 5px rgba(118, 215, 196, 0.8);
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        button {
            border-radius: 25px;
            padding: 12px 20px;
            font-size: 16px;
            transition: transform 0.3s ease, background-color 0.4s ease;
            background-color: #388e3c;
            color: white;
            border: none;
        }

        button:hover {
            transform: scale(1.05);
            background-color: #66bb6a;
        }

        button i {
            margin-right: 10px;
        }

        /* Reset links */
        a#clean_roles, a#clean_permissions {
            color: #d32f2f;
            font-size: 14px;
            text-decoration: none;
        }

        a#clean_roles:hover, a#clean_permissions:hover {
            text-decoration: underline;
        }

        /* Alert messages */
        .alert-danger {
            font-size: 14px;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
        }

        /* Adjust margins for responsive layouts */
        @media (max-width: 768px) {
            .col-12 {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
</head>
<body>
@extends('layouts.master')

@section('title', 'Edit User')

@section('content')

<!-- Include jQuery for reset buttons -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#clean_permissions").click(function(){
    $('#permissions').val([]);
  });
  $("#clean_roles").click(function(){
    $('#roles').val([]);
  });
});
</script>

<div class="container">
    <h1 class="text-center mb-4">✏️ Edit Customer</h1>

    <!-- Display error messages -->
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <strong>Error!</strong> {{$error}}
    </div>
    @endforeach

    <!-- User Edit Form -->
    <form action="{{ route('users_save', $user->id) }}" method="post" class="p-4 rounded shadow-sm bg-light">
        {{ csrf_field() }}

        <!-- User Name -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" required value="{{ $user->name }}">
            </div>
        </div>

        @can('admin_users')
        <!-- Roles -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="roles" class="form-label">Roles:</label> 
                (<a href="#" id="clean_roles"><i class="fas fa-trash-alt"></i> Reset</a>)
                <select multiple class="form-select" id="roles" name="roles[]">
                    @foreach($roles as $role)
                    <option value="{{$role->name}}" {{$role->taken ? 'selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Permissions -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="permissions" class="form-label">Direct Permissions:</label> 
                (<a href="#" id="clean_permissions"><i class="fas fa-trash-alt"></i> Reset</a>)
                <select multiple class="form-select" id="permissions" name="permissions[]">
                    @foreach($permissions as $permission)
                    <option value="{{$permission->name}}" {{$permission->taken ? 'selected' : ''}}>{{$permission->display_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endcan

        @can('addCredit')
        <!-- Credit Amount -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="credit" class="form-label">Credit Amount:</label>
                <input type="number" class="form-control" name="credit" placeholder="Enter Credit Amount" required min="1">
            </div>
        </div>
        @endcan

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success w-100 mt-3">
            <i class="fas fa-save"></i> Save Changes
        </button>
    </form>
</div>

@endsection

</body>
</html>
