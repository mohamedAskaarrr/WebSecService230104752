<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-4">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('even-numbers') ? 'active' : '' }}" href="{{ url('/even-numbers') }}">Even Numbers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('prime-numbers') ? 'active' : '' }}" href="{{ url('/prime-numbers') }}">Prime Numbers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('multiplication-table') ? 'active' : '' }}" href="{{ url('/multiplication-table') }}">Multiplication Table</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('MiniTest') ? 'active' : '' }}" href="{{ url('/MiniTest') }}">MiniTest</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('Transcript') ? 'active' : '' }}" href="{{ url('/Transcript') }}">Transcript</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('grades') ? 'active' : '' }}" href="{{ url('/grades') }}">Grades</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('/users') }}">Users</a>
        </li>
    </ul>

    <div class="mt-3">
        <div class="card card-body">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>