<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to My Blog - Discover amazing content from our community of writers">
    <meta name="keywords" content="blog, articles, community, knowledge sharing, writing">
    <title>Welcome Guest - My Blog</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='50' fill='%23739EC9'/><text x='50' y='65' font-family='Arial' font-size='60' fill='white' text-anchor='middle' font-weight='bold'>B</text></svg>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #739EC9;
            --primary-dark: #5a7ea3;
            --primary-light: #8fb3d4;
            --text-primary: #2d3748;
            --text-secondary: #4a5568;
            --text-light: #718096;
            --white: #ffffff;
            --background: #f7fafc;
            --card-background: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header styles */
        .header {
            text-align: center;
            margin-bottom: 4rem;
            background: var(--card-background);
            padding: 3rem 2rem;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light), var(--primary-color));
        }

        .header-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            color: var(--white);
            font-size: 3rem;
            box-shadow: 0 8px 20px rgba(115, 158, 201, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .header h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .header p {
            color: var(--text-light);
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Auth buttons */
        .auth-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .auth-btn {
            padding: 1rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .auth-btn.primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 4px 6px rgba(115, 158, 201, 0.3);
        }

        .auth-btn.secondary {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .auth-btn:hover {
            transform: translateY(-2px);
        }

        .auth-btn.primary:hover {
            box-shadow: 0 6px 12px rgba(115, 158, 201, 0.4);
        }

        .auth-btn.secondary:hover {
            background: var(--primary-color);
            color: var(--white);
        }

        /* Posts grid */
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .post-card {
            background: var(--card-background);
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            border-top: 4px solid var(--primary-color);
        }

        .post-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .post-image {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .post-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
        }

        .post-image.placeholder {
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
            font-size: 3rem;
        }

        .post-content {
            padding: 1.5rem;
        }

        .post-category {
            background: rgba(115, 158, 201, 0.1);
            color: var(--primary-color);
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .post-title {
            color: var(--text-primary);
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .post-excerpt {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
            font-size: 0.875rem;
            color: var(--text-light);
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .author-avatar {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
            font-size: 0.75rem;
        }

        .date-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Call to action section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            padding: 3rem 2rem;
            border-radius: 16px;
            text-align: center;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><pattern id="grain" width="100" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="20" fill="url(%23grain)"/></svg>');
        }

        .cta-content {
            position: relative;
            z-index: 1;
        }

        .cta-section h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .cta-section p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        .footer {
            background: var(--text-primary);
            color: var(--white);
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .footer p {
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .header {
                padding: 2rem 1rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .posts-grid {
                grid-template-columns: 1fr;
            }

            .auth-buttons {
                flex-direction: column;
                align-items: center;
            }

            .auth-btn {
                width: 200px;
                text-align: center;
            }
        }

        /* Animation for post cards */
        .post-card {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="header-icon">📚</div>
            <h1>Welcome to My Blog!</h1>
            <p>Discover amazing articles, insights, and stories from our talented community of writers. Join us today to start your own blogging journey!</p>
            
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="auth-btn primary">
                    🔐 Sign In
                </a>
                <a href="{{ route('register') }}" class="auth-btn secondary">
                    👤 Join Community
                </a>
            </div>
        </div>

        <!-- Posts Section -->
        <div style="margin-bottom: 2rem;">
            <h2 style="
                color: var(--primary-color);
                font-size: 2rem;
                text-align: center;
                margin-bottom: 1rem;
                font-weight: 700;
            ">📝 Latest Published Posts</h2>
            <p style="
                text-align: center;
                color: var(--text-light);
                font-size: 1.1rem;
                max-width: 600px;
                margin: 0 auto 2rem;
            ">
                Explore our collection of thoughtfully crafted articles and discover new perspectives
            </p>
        </div>

        <div class="posts-grid">
            @forelse ($posts as $index => $post)
                <article class="post-card" style="animation-delay: {{ $index * 0.1 }}s;">
                    <!-- Post Image -->
                    @if($post->image)
                        <div class="post-image" style="background-image: url('{{ asset('storage/' . $post->image) }}');"></div>
                    @else
                        <div class="post-image placeholder">
                            📄
                        </div>
                    @endif

                    <!-- Post Content -->
                    <div class="post-content">
                        <!-- Category Badge -->
                        <span class="post-category">
                            📂 {{ $post->category->name ?? 'Uncategorized' }}
                        </span>

                        <!-- Post Title -->
                        <h3 class="post-title">{{ $post->title }}</h3>

                        <!-- Post Excerpt -->
                        <p class="post-excerpt">{{ Str::limit(strip_tags($post->content), 120) }}</p>

                        <!-- Post Meta -->
                        <div class="post-meta">
                            <div class="author-info">
                                <div class="author-avatar">
                                    {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                </div>
                                <span>{{ $post->user->name }}</span>
                            </div>
                            
                            <div class="date-info">
                                <span>📅</span>
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <!-- Read More Button -->
                        <div style="margin-top: 1.5rem;">
                            <button style="
                                background: transparent;
                                color: var(--primary-color);
                                border: 2px solid var(--primary-color);
                                padding: 0.75rem 1.5rem;
                                border-radius: 6px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                                width: 100%;
                                font-size: 0.9rem;
                            " onmouseover="this.style.background='var(--primary-color)'; this.style.color='var(--white)';" 
                               onmouseout="this.style.background='transparent'; this.style.color='var(--primary-color)';">
                                📖 Read Full Article
                            </button>
                        </div>
                    </div>
                </article>
            @empty
                <div style="
                    grid-column: 1 / -1;
                    text-align: center;
                    padding: 4rem 2rem;
                    background: var(--card-background);
                    border-radius: 12px;
                    box-shadow: var(--shadow-md);
                ">
                    <div style="font-size: 4rem; margin-bottom: 1rem; color: #a0aec0;">📝</div>
                    <h3 style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 1.5rem;">No Posts Available</h3>
                    <p style="color: var(--text-light); margin-bottom: 2rem;">
                        We're working on creating amazing content for you. Check back soon!
                    </p>
                    <div class="auth-buttons">
                        <a href="{{ route('register') }}" class="auth-btn primary">
                            Join Us & Create Content
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Call to Action Section -->
        <div class="cta-section">
            <div class="cta-content">
                <h3>Ready to Share Your Voice?</h3>
                <p>Join our community of passionate writers and readers. Create your account today and start publishing your own amazing content!</p>
                
                <div class="auth-buttons">
                    <a href="{{ route('register') }}" class="auth-btn" style="
                        background: var(--white);
                        color: var(--primary-color);
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    " onmouseover="this.style.transform='translateY(-3px) scale(1.05)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.2)';" 
                       onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                        🚀 Get Started Today
                    </a>
                </div>

                <!-- Feature highlights -->
                <div style="
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 2rem;
                    margin-top: 3rem;
                    text-align: left;
                ">
                    <div style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 0.5rem;">✍️</div>
                        <h4 style="margin-bottom: 0.5rem; color: var(--white);">Easy Writing</h4>
                        <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.8); margin: 0;">
                            User-friendly editor with rich formatting options
                        </p>
                    </div>
                    
                    <div style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 0.5rem;">👥</div>
                        <h4 style="margin-bottom: 0.5rem; color: var(--white);">Active Community</h4>
                        <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.8); margin: 0;">
                            Connect with like-minded writers and readers
                        </p>
                    </div>
                    
                    <div style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 0.5rem;">📈</div>
                        <h4 style="margin-bottom: 0.5rem; color: var(--white);">Grow Your Audience</h4>
                        <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.8); margin: 0;">
                            Reach readers who appreciate quality content
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <p>&copy; {{ date('Y') }} My Blog. All rights reserved. Made with ❤️ for the communityyy.</p>
        </div>
    </footer>

    <script>
        // Add smooth scrolling and interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Stagger animation for post cards
            const postCards = document.querySelectorAll('.post-card');
            postCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Add click handlers for read more buttons
            const readMoreButtons = document.querySelectorAll('button');
            readMoreButtons.forEach(button => {
                if (button.textContent.includes('Read Full Article')) {
                    button.addEventListener('click', function() {
                        alert('Please sign in to read the full article!');
                    });
                }
            });

            // Add parallax effect to header icon
            const headerIcon = document.querySelector('.header-icon');
            let ticking = false;

            function updateIconPosition() {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                if (headerIcon) {
                    headerIcon.style.transform = `translateY(${rate}px) scale(${1 + scrolled * 0.0001})`;
                }
                
                ticking = false;
            }

            function requestIconUpdate() {
                if (!ticking) {
                    requestAnimationFrame(updateIconPosition);
                    ticking = true;
                }
            }

            window.addEventListener('scroll', requestIconUpdate);
        });
    </script>
</body>
</html>