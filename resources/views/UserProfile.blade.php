<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-control-sm {
            height: 31px;
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        .ms-2 { margin-left: 0.5rem; }
        .me-1 { margin-right: 0.25rem; }
        .me-2 { margin-right: 0.5rem; }
    </style>
</head>
<body>
   
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6 d-flex align-items-center">
                                <span id="nameDisplay">{{ Auth::user()->name }}</span>
                                <button type="button" class="btn btn-sm btn-primary ms-2" onclick="toggleNameEdit()">
                                    Edit
                                </button>
                                
                                <!-- Hidden form for editing name -->
                                <form id="nameEditForm" style="display: none;" class="d-flex" 
                                      action="{{ route('user.profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" class="form-control form-control-sm me-2" 
                                           name="name" value="{{ Auth::user()->name }}">
                                    <button type="submit" class="btn btn-sm btn-success me-1">Save</button>
                                    <button type="button" class="btn btn-sm btn-secondary" 
                                            onclick="toggleNameEdit()">Cancel</button>
                                </form>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <span>{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">age</label>
                            <div class="col-md-6">
                                <span>{{ Auth::user()->age }}</span>
                            </div>


                            <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Credit</label>
                            <div class="col-md-6">
                                <span>{{ Auth::user()->credit }}</span>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleNameEdit() {
        const nameDisplay = document.getElementById('nameDisplay');
        const nameEditForm = document.getElementById('nameEditForm');
        
        if (nameDisplay.style.display !== 'none') {
            nameDisplay.style.display = 'none';
            nameEditForm.style.display = 'flex';
        } else {
            nameDisplay.style.display = 'inline';
            nameEditForm.style.display = 'none';
        }
    }
    </script>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</body>
</html>
