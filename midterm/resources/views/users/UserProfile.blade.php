<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .edit-button {
            padding: 2px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            margin-left: 10px;
        }
        .name-edit-form {
            display: none;
            margin-top: 5px;
        }
    </style>
</head>
<body>
  <div class="container">

        <div class="card mt-4">
            <div class="card-header text-center text-white" style="background-color: #007bff;">
                <h2>User Profile</h2>
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

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col-md-3" style="background-color: #f8f9fa;">
                        Name:
                    </div>
                    <div class="col-md-9">
                        <span id="nameDisplay">{{ Auth::user()->name }}</span>
                        <button type="button" class="edit-button" onclick="toggleNameEdit()">Edit</button>
                        
                        <form id="nameEditForm" class="name-edit-form" action="{{ route('user.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group" style="width: 400px;">
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-danger" onclick="toggleNameEdit()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3" style="background-color: #f8f9fa;">
                        Email:
                    </div>
                    <div class="col-md-9">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3" style="background-color: #f8f9fa;">
                        password:
                    </div>
                    <div class="col-md-9">
                        {{ Auth::user()->password }}
                    </div>
                </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-3" style="background-color: #f8f9fa;">
                        Age:
                    </div>
                    <div class="col-md-9">
                        {{ Auth::user()->age }}
                    </div>
                </div>

                <div class="text-center mt-4">
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
            nameEditForm.style.display = 'block';
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
