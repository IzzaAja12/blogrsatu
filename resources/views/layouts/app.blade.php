<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Professional blog platform for sharing knowledge and connecting with readers')">
    <meta name="keywords" content="@yield('meta_keywords', 'blog, writing, articles, community, knowledge sharing')">
    <meta name="author" content="My Blog">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title') - My Blog">
    <meta property="og:description" content="@yield('meta_description', 'Professional blog platform for sharing knowledge and connecting with readers')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title') - My Blog">
    <meta name="twitter:description" content="@yield('meta_description', 'Professional blog platform for sharing knowledge and connecting with readers')">
    
    <title>@yield('title') - My Blog</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='50' fill='%23739EC9'/><text x='50' y='65' font-family='Arial' font-size='60' fill='white' text-anchor='middle' font-weight='bold'>B</text></svg>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Additional Page Styles -->
    @stack('styles')
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Page Loader -->
    <div id="page-loader" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #739EC9, #5a7ea3);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        transition: opacity 0.5s ease;
    ">
        <div style="text-align: center; color: white;">
            <div style="
                width: 60px;
                height: 60px;
                border: 4px solid rgba(255, 255, 255, 0.3);
                border-top: 4px solid white;
                border-radius: 50%;
                animation: spin 1s linear infinite;
                margin: 0 auto 1rem;
            "></div>
            <p style="font-size: 1.1rem; font-weight: 500; margin: 0;">Loading...</p>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">
                <div style="
                    width: 35px;
                    height: 35px;
                    background: white;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-right: 0.75rem;
                    color: #739EC9;
                    font-weight: 700;
                    font-size: 1.2rem;
                ">B</div>
                My Blog
            </a>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()" style="
                display: none;
                background: none;
                border: none;
                color: white;
                font-size: 1.5rem;
                cursor: pointer;
                padding: 0.5rem;
            ">☰</button>

            <ul class="navbar-menu" id="navbar-menu">
                <li><a href="{{ route('posts.index') }}">📝 Posts</a></li>
                @if (Auth::check())
                    <li><a href="{{ route('dashboard') }}">🏠 Dashboard</a></li>
                    @if (in_array(Auth::user()->role, ['admin', 'author']))
                        <li><a href="{{ route('posts.create') }}">✏ Create Post</a></li>
                    @endif
                    <li class="user-menu">
                        <div class="user-info" onclick="toggleUserDropdown()" style="
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            cursor: pointer;
                            padding: 0.5rem 1rem;
                            border-radius: 8px;
                            transition: all 0.3s ease;
                            position: relative;
                        ">
                            <div style="
                                width: 32px;
                                height: 32px;
                                background: rgba(255, 255, 255, 0.2);
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-weight: 600;
                                font-size: 0.9rem;
                            ">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            <span style="color: white; font-weight: 500;">{{ Auth::user()->name }}</span>
                            <span style="color: rgba(255, 255, 255, 0.8); font-size: 0.8rem;">▼</span>
                        </div>
                        
                        <div class="user-dropdown" id="user-dropdown" style="
                            position: absolute;
                            top: 100%;
                            right: 0;
                            background: white;
                            border-radius: 8px;
                            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
                            min-width: 200px;
                            opacity: 0;
                            visibility: hidden;
                            transform: translateY(-10px);
                            transition: all 0.3s ease;
                            z-index: 1000;
                            margin-top: 0.5rem;
                        ">
                            <div style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                <p style="margin: 0; font-weight: 600; color: #2d3748;">{{ Auth::user()->name }}</p>
                                <p style="margin: 0; font-size: 0.875rem; color: #718096;">{{ Auth::user()->email }}</p>
                            </div>
                            <div style="padding: 0.5rem 0;">
                                <a href="{{ route('dashboard') }}" style="
                                    display: flex;
                                    align-items: center;
                                    gap: 0.75rem;
                                    padding: 0.75rem 1rem;
                                    color: #4a5568;
                                    text-decoration: none;
                                    transition: all 0.2s ease;
                                " onmouseover="this.style.background='#f7fafc';" onmouseout="this.style.background='transparent';">
                                    <span>🏠</span> Dashboard
                                </a>
                                <a href="#" style="
                                    display: flex;
                                    align-items: center;
                                    gap: 0.75rem;
                                    padding: 0.75rem 1rem;
                                    color: #4a5568;
                                    text-decoration: none;
                                    transition: all 0.2s ease;
                                " onmouseover="this.style.background='#f7fafc';" onmouseout="this.style.background='transparent';">
                                    <span>⚙</span> Settings
                                </a>
                                <a href="#" style="
                                    display: flex;
                                    align-items: center;
                                    gap: 0.75rem;
                                    padding: 0.75rem 1rem;
                                    color: #4a5568;
                                    text-decoration: none;
                                    transition: all 0.2s ease;
                                " onmouseover="this.style.background='#f7fafc';" onmouseout="this.style.background='transparent';">
                                    <span>👤</span> Profile
                                </a>
                                <div style="height: 1px; background: #e2e8f0; margin: 0.5rem 0;"></div>
                                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                    @csrf
                                    <button type="submit" style="
                                        width: 100%;
                                        display: flex;
                                        align-items: center;
                                        gap: 0.75rem;
                                        padding: 0.75rem 1rem;
                                        background: none;
                                        border: none;
                                        color: #e53e3e;
                                        text-align: left;
                                        cursor: pointer;
                                        transition: all 0.2s ease;
                                        font-size: 1rem;
                                    " onmouseover="this.style.background='#fed7d7';" onmouseout="this.style.background='transparent';">
                                        <span>🚪</span> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" style="
                                background: rgba(231, 76, 60, 0.9);
                                color: white;
                                border: none;
                                padding: 0.5rem 1rem;
                                border-radius: 6px;
                                cursor: pointer;
                                font-size: 0.9rem;
                                font-weight: 500;
                                transition: all 0.3s ease;
                                display: flex;
                                align-items: center;
                                gap: 0.5rem;
                            " onmouseover="this.style.background='rgba(231, 76, 60, 1)'; this.style.transform='translateY(-1px)';" onmouseout="this.style.background='rgba(231, 76, 60, 0.9)'; this.style.transform='translateY(0)';">
                                🚪 Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">🔐 Login</a></li>
                    <li>
                        <a href="{{ route('register') }}" style="
                            background: rgba(255, 255, 255, 0.1);
                            padding: 0.5rem 1rem;
                            border-radius: 6px;
                            border: 2px solid rgba(255, 255, 255, 0.2);
                        ">👤 Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success" style="animation: slideInDown 0.5s ease;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error" style="animation: slideInDown 0.5s ease;">
                {{ session('error') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="alert" style="
                background: rgba(237, 137, 54, 0.1);
                color: #c05621;
                border-left-color: #ed8936;
                animation: slideInDown 0.5s ease;
            ">
                {{ session('warning') }}
            </div>
        @endif

        <!-- Breadcrumb -->
        @if(isset($breadcrumbs))
            <nav style="margin-bottom: 2rem;">
                <ol style="
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                    list-style: none;
                    padding: 1rem;
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                    margin: 0;
                ">
                    @foreach($breadcrumbs as $breadcrumb)
                        <li style="display: flex; align-items: center; gap: 0.5rem;">
                            @if($loop->last)
                                <span style="color: #718096; font-weight: 500;">{{ $breadcrumb['title'] }}</span>
                            @else
                                <a href="{{ $breadcrumb['url'] }}" style="color: #739EC9; text-decoration: none; font-weight: 500;">
                                    {{ $breadcrumb['title'] }}
                                </a>
                                <span style="color: #a0aec0;">›</span>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>
        @endif

        <!-- Page Content -->
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div style="max-width: 1200px; margin: 0 auto; padding: 2rem; text-align: center;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 2rem; text-align: left;">
                <div>
                    <h4 style="color: white; margin-bottom: 1rem; font-size: 1.2rem;">My Blog</h4>
                    <p style="color: rgba(255, 255, 255, 0.8); margin-bottom: 1rem; line-height: 1.6;">
                        A professional platform for sharing knowledge, connecting with readers, and building a community of writers.
                    </p>
                    <div style="display: flex; gap: 1rem;">
                        <a href="#" style="
                            color: rgba(255, 255, 255, 0.8);
                            text-decoration: none;
                            font-size: 1.5rem;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.color='white'; this.style.transform='translateY(-2px)';"
                           onmouseout="this.style.color='rgba(255, 255, 255, 0.8)'; this.style.transform='translateY(0)';">📘</a>
                        <a href="#" style="
                            color: rgba(255, 255, 255, 0.8);
                            text-decoration: none;
                            font-size: 1.5rem;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.color='white'; this.style.transform='translateY(-2px)';"
                           onmouseout="this.style.color='rgba(255, 255, 255, 0.8)'; this.style.transform='translateY(0)';">🐦</a>
                        <a href="#" style="
                            color: rgba(255, 255, 255, 0.8);
                            text-decoration: none;
                            font-size: 1.5rem;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.color='white'; this.style.transform='translateY(-2px)';"
                           onmouseout="this.style.color='rgba(255, 255, 255, 0.8)'; this.style.transform='translateY(0)';">💼</a>
                    </div>
                </div>
                
                <div>
                    <h4 style="color: white; margin-bottom: 1rem; font-size: 1.2rem;">Quick Links</h4>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 0.5rem;">
                            <a href="{{ route('posts.index') }}" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease;" 
                               onmouseover="this.style.color='white';" onmouseout="this.style.color='rgba(255, 255, 255, 0.8)';">All Posts</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease;" 
                               onmouseover="this.style.color='white';" onmouseout="this.style.color='rgba(255, 255, 255, 0.8)';">About Us</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease;" 
                               onmouseover="this.style.color='white';" onmouseout="this.style.color='rgba(255, 255, 255, 0.8)';">Contact</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease;" 
                               onmouseover="this.style.color='white';" onmouseout="this.style.color='rgba(255, 255, 255, 0.8)';">FAQ</a>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h4 style="color: white; margin-bottom: 1rem; font-size: 1.2rem;">Legal</h4>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 0.5rem;">
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease;" 
                               onmouseover="this.style.color='white';" onmouseout="this.style.color='rgba(255, 255, 255, 0.8)';">Privacy Policy</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease;" 
                               onmouseover="this.style.color='white';" onmouseout="this.style.color='rgba(255, 255, 255, 0.8)';">Terms of Service</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="#" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: color 0.3s ease;" 
                               onmouseover="this.style.color='white';" onmouseout="this.style.color='rgba(255, 255, 255, 0.8)';">Cookie Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div style="border-top: 1px solid rgba(255, 255, 255, 0.2); padding-top: 2rem;">
                <p style="color: rgba(255, 255, 255, 0.8); margin: 0;">
                    &copy; {{ date('Y') }} My Blog. All rights reserved. Made with ❤ for the community.
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" onclick="scrollToTop()" style="
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #739EC9, #5a7ea3);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.2rem;
        box-shadow: 0 4px 12px rgba(115, 158, 201, 0.4);
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
        z-index: 1000;
    " onmouseover="this.style.transform='translateY(-5px) scale(1.1)';" onmouseout="this.style.transform='translateY(0) scale(1)';">
        ↑
    </button>

    <!-- Scripts -->
    <script>
        // Page loader
        window.addEventListener('load', function() {
            const loader = document.getElementById('page-loader');
            loader.style.opacity = '0';
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500);
        });

        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('navbar-menu');
            const btn = document.querySelector('.mobile-menu-btn');
            
            if (menu.classList.contains('mobile-active')) {
                menu.classList.remove('mobile-active');
                btn.textContent = '☰';
            } else {
                menu.classList.add('mobile-active');
                btn.textContent = '✕';
            }
        }

        // User dropdown toggle
        function toggleUserDropdown() {
            const dropdown = document.getElementById('user-dropdown');
            if (dropdown.style.opacity === '1') {
                dropdown.style.opacity = '0';
                dropdown.style.visibility = 'hidden';
                dropdown.style.transform = 'translateY(-10px)';
            } else {
                dropdown.style.opacity = '1';
                dropdown.style.visibility = 'visible';
                dropdown.style.transform = 'translateY(0)';
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.querySelector('.user-menu');
            const dropdown = document.getElementById('user-dropdown');
            
            if (userMenu && !userMenu.contains(event.target)) {
                dropdown.style.opacity = '0';
                dropdown.style.visibility = 'hidden';
                dropdown.style.transform = 'translateY(-10px)';
            }
        });

        // Back to top functionality
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/hide back to top button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('back-to-top');
            if (window.pageYOffset > 300) {
                backToTop.style.opacity = '1';
                backToTop.style.visibility = 'visible';
                backToTop.style.transform = 'translateY(0)';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.visibility = 'hidden';
                backToTop.style.transform = 'translateY(20px)';
            }
        });

        // Auto-hide alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        alert.remove();
                    }, 300);
                }, 5000);
            });
        });

        // Smooth scroll for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    <!-- Additional Page Scripts -->
    @stack('scripts')

    <!-- Additional animations -->
    <style>
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Mobile menu styles */
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block !important;
            }

            .navbar-menu {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #739EC9;
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-height: 0;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .navbar-menu.mobile-active {
                max-height: 500px;
            }

            .user-menu .user-dropdown {
                position: static;
                opacity: 1 !important;
                visibility: visible !important;
                transform: none !important;
                box-shadow: none;
                background: rgba(255, 255, 255, 0.1);
                margin-top: 1rem;
            }
        }
    </style>
</body>
</html>