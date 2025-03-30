<div class="dropdown position-absolute top-0 end-0 m-3">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Menu
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="{{ url('Roles') }}">Roles</a></li>
        <li><a class="dropdown-item" href="{{ url('permissions') }}">Permissions</a></li>
        <li><a class="dropdown-item" href="{{ url('products/index') }}">Users</a></li>
        <li><a class="dropdown-item text-Blue" href="{{ url('product') }}">Products</a></li>
        <li><a class="dropdown-item text-danger" href="{{ url('/') }}">Back to the Home page</a></li>
    </ul>
</div>
