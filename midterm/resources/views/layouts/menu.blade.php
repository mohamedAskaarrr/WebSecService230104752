<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <!-- Left side of the navbar -->

        <!-- Right side of the navbar -->
        <ul class="navbar-nav ms-auto">
            @auth
                <!-- Display user name and logout link if authenticated -->
                <li class="nav-item">
                    <a class="nav-link text-black">{{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('register') }}">Logout</a>
                </li>
            @else
                <!-- Display login and register links if not authenticated -->
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route('register') }}">Register</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>