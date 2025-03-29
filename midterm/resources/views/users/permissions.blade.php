@extends('layout')

@section('content')
<div class="container">
    <h2>Edit User Permissions</h2>
    
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Role</label>
            <select name="Role" class="form-control">
                <option value="user" {{ $user->Role == 'user' ? 'selected' : '' }}>User</option>
                <option value="employee" {{ $user->Role == 'employee' ? 'selected' : '' }}>Employee</option>
                <option value="admin" {{ $user->Role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label>Permissions</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="permissions[]" value="view_users"
                        {{ $user->hasPermission('view_users') ? 'checked' : '' }}>
                    View Users
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="permissions[]" value="edit_users"
                        {{ $user->hasPermission('edit_users') ? 'checked' : '' }}>
                    Edit Users
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="permissions[]" value="delete_users"
                        {{ $user->hasPermission('delete_users') ? 'checked' : '' }}>
                    Delete Users
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Permissions</button>
    </form>
</div>
@endsection 