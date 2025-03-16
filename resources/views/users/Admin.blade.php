@extends('layout')

@section('content')
<div class="container">
    <h2>User Management</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->Role }}</td>
                <td>
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <select name="Role" onchange="this.form.submit()">
                            <option value="user" {{ $user->Role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->Role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </form>
                    
                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

