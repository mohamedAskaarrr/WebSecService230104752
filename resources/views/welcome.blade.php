<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="bill">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./even">Even Numbers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./minitest">minitest</a>
                </li>
                <li>
                    <a class="nav-link" href="./create">create</a>
                </li>
                <li>
                    <a class="nav-link" href="./products/index">currunt users</a>
                </li>
            </ul>
        </div>
    </nav>
    <li class="nav-item">
            <a class="nav-link {{ request()->is('grades') ? 'active' : '' }}" href="{{ url('/grades') }}">Grades</a>
        </li>    </div>
</body>
</html>