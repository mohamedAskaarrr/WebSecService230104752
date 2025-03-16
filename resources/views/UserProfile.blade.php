<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .edit-button {
            margin-left: 10px;
            padding: 2px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-inline {
            display: none;
            margin-top: 5px;
        }
        .save-button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 2px 10px;
            margin-right: 5px;
        }
        .cancel-button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 2px 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">User Profile</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="table">
                    <tr>
                        <td style="width: 200px; background-color: #f8f9fa;">Name:</td>
                        <td>
                            <span id="nameDisplay">{{ Auth::user()->name }}</span>
                            <button type="button" class="edit-button" onclick="toggleNameEdit()">Edit</button>
                            
                            <form id="nameEditForm" class="form-inline" action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" class="form-control form-control-sm d-inline" 
                                       name="name" value="{{ Auth::user()->name }}" style="width: 200px;">
                                <button type="submit" class="save-button">Save</button>
                                <button type="button" class="cancel-button" onclick="toggleNameEdit()">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f8f9fa;">Email:</td>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #f8f9fa;">Password (Hashed):</td>
                        <td style="color: #dc3545;">{{ Auth::user()->password }}</td>
                    </tr>
                </table>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleNameEdit() {
        const nameDisplay = document.getElementById('nameDisplay');
        const nameEditForm = document.getElementById('nameEditForm');
        const editButton = document.querySelector('.edit-button');
        
        if (nameEditForm.style.display === 'none' || nameEditForm.style.display === '') {
            nameDisplay.style.display = 'none';
            nameEditForm.style.display = 'inline-block';
            editButton.style.display = 'none';
        } else {
            nameDisplay.style.display = 'inline';
            nameEditForm.style.display = 'none';
            editButton.style.display = 'inline-block';
        }
    }
    </script>
</body>
</html>