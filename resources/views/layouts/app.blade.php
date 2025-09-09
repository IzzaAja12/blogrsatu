<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Blog</title>
    <!-- Google Fonts untuk font profesional (sans-serif modern) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">My Blog</a>
            <ul class="navbar-menu">
                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                @if (Auth::check())
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @if (in_array(Auth::user()->role, ['admin', 'author']))
                        <li><a href="{{ route('posts.create') }}">Create Post</a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                            <button type="submit" class="navbar-button">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer Opsional (untuk profesionalitas) -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} My Blog. All rights reserved.</p>
    </footer>
</body>
</html>