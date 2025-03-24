<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Permission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
              
                    <!-- <div class="card mt-3">
                        <div class="class-header">
                            <h4>
                                    permissionss
                                    <a href="{{url('permissions/create')  }}" class="btn btn-primary float-end">add </a> 

                            </h4>        
                    </div>

                    <form action="{{ url('permissoins') }}" method="post">

                    <div class="mb-3">
                        <label for="">permission Name</label>
                        <input type="text" name="name" class="form-control">

                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit"> save</button>

                    </div>
                    </form> -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Create Permission</h4>
                        <a href="{{ url('permissions') }}" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('permissions') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
