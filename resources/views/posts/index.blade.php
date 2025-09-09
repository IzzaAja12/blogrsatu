@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Header Section -->
        <div style="text-align: center; margin-bottom: 3rem;">
            <div style="
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #739EC9, #8fb3d4);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: white;
                font-size: 2rem;
                box-shadow: 0 8px 16px rgba(115, 158, 201, 0.3);
            ">📝</div>
            <h2 style="color: #739EC9; margin-bottom: 0.5rem;">All Posts</h2>
            <p style="color: #718096; font-size: 1.1rem;">Discover amazing content from our community</p>
            
            @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'author']))
                <div style="margin-top: 2rem;">
                    <a href="{{ route('posts.create') }}" style="
                        background: linear-gradient(135deg, #739EC9, #5a7ea3);
                        color: white;
                        padding: 1rem 2rem;
                        border-radius: 8px;
                        text-decoration: none;
                        font-weight: 600;
                        transition: all 0.3s ease;
                        display: inline-block;
                        box-shadow: 0 4px 6px rgba(115, 158, 201, 0.3);
                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(115, 158, 201, 0.4)';" 
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(115, 158, 201, 0.3)';">
                        ✏️ Create New Post
                    </a>
                </div>
            @endif
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success" style="margin-bottom: 2rem; animation: slideInDown 0.5s ease;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Bar -->
        <div style="
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        ">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <span style="font-weight: 600; color: #4a5568;">🔍 Filter:</span>
                <select style="
                    padding: 0.5rem;
                    border: 2px solid #e2e8f0;
                    border-radius: 6px;
                    background: #f8fafc;
                    cursor: pointer;
                " onchange="filterPosts(this.value)">
                    <option value="all">All Categories</option>
                    <option value="published">Published Only</option>
                    <option value="draft">Drafts Only</option>
                </select>
            </div>
            
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-left: auto;">
                <span style="font-weight: 600; color: #4a5568;">📊 Sort:</span>
                <select style="
                    padding: 0.5rem;
                    border: 2px solid #e2e8f0;
                    border-radius: 6px;
                    background: #f8fafc;
                    cursor: pointer;
                " onchange="sortPosts(this.value)">
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="title">By Title</option>
                </select>
            </div>
        </div>

        <!-- Posts Grid -->
        <div id="posts-container" style="
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        ">
            @forelse ($posts as $post)
                <article class="post-card" data-category="{{ $post->category->name ?? 'uncategorized' }}" data-published="{{ $post->published ? 'published' : 'draft' }}" data-title="{{ strtolower($post->title) }}" data-date="{{ $post->created_at->timestamp }}" style="
                    background: white;
                    border-radius: 12px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: all 0.3s ease;
                    position: relative;
                    border-top: 4px solid {{ $post->published ? '#48bb78' : '#ed8936' }};
                " onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 25px rgba(0, 0, 0, 0.15)';" 
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                    
                    <!-- Post Status Badge -->
                    <div style="
                        position: absolute;
                        top: 1rem;
                        right: 1rem;
                        background: {{ $post->published ? 'linear-gradient(135deg, #48bb78, #38a169)' : 'linear-gradient(135deg, #ed8936, #dd6b20)' }};
                        color: white;
                        padding: 0.5rem 1rem;
                        border-radius: 20px;
                        font-size: 0.875rem;
                        font-weight: 600;
                        z-index: 10;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    ">
                        {{ $post->published ? '🟢 Published' : '🟡 Draft' }}
                    </div>

                    <!-- Post Image -->
                    @if($post->image)
                        <div style="
                            height: 200px;
                            background-image: url('{{ asset('storage/' . $post->image) }}');
                            background-size: cover;
                            background-position: center;
                            position: relative;
                        ">
                            <div style="
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                height: 50%;
                                background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
                            "></div>
                        </div>
                    @else
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #f7fafc, #edf2f7);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #a0aec0;
                            font-size: 3rem;
                        ">
                            📄
                        </div>
                    @endif

                    <!-- Post Content -->
                    <div style="padding: 1.5rem;">
                        <!-- Category Badge -->
                        <div style="margin-bottom: 1rem;">
                            <span style="
                                background: rgba(115, 158, 201, 0.1);
                                color: #739EC9;
                                padding: 0.25rem 0.75rem;
                                border-radius: 12px;
                                font-size: 0.875rem;
                                font-weight: 600;
                            ">
                                📂 {{ $post->category->name ?? 'Uncategorized' }}
                            </span>
                        </div>

                        <!-- Post Title -->
                        <h3 style="
                            color: #2d3748;
                            font-size: 1.3rem;
                            font-weight: 700;
                            margin-bottom: 1rem;
                            line-height: 1.3;
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                        ">
                            {{ $post->title }}
                        </h3>

                        <!-- Post Excerpt -->
                        <p style="
                            color: #4a5568;
                            line-height: 1.6;
                            margin-bottom: 1.5rem;
                            display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                        ">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>

                        <!-- Post Meta -->
                        <div style="
                            display: flex;
                            align-items: center;
                            gap: 1rem;
                            margin-bottom: 1.5rem;
                            padding-top: 1rem;
                            border-top: 1px solid #e2e8f0;
                            font-size: 0.875rem;
                            color: #718096;
                        ">
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <div style="
                                    width: 24px;
                                    height: 24px;
                                    background: linear-gradient(135deg, #739EC9, #8fb3d4);
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-weight: 600;
                                    font-size: 0.75rem;
                                ">{{ strtoupper(substr($post->user->name, 0, 1)) }}</div>
                                <span>{{ $post->user->name }}</span>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <span>📅</span>
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <div style="display: flex; gap: 0.75rem;">
                                <a href="{{ route('posts.edit', $post) }}" style="
                                    background: linear-gradient(135deg, #48bb78, #38a169);
                                    color: white;
                                    padding: 0.75rem 1rem;
                                    border-radius: 6px;
                                    text-decoration: none;
                                    font-weight: 600;
                                    font-size: 0.875rem;
                                    transition: all 0.3s ease;
                                    flex: 1;
                                    text-align: center;
                                " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(72, 187, 120, 0.3)';" 
                                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    ✏️ Edit
                                </a>
                                
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="
                                        background: linear-gradient(135deg, #e53e3e, #c53030);
                                        color: white;
                                        padding: 0.75rem 1rem;
                                        border-radius: 6px;
                                        border: none;
                                        font-weight: 600;
                                        font-size: 0.875rem;
                                        cursor: pointer;
                                        transition: all 0.3s ease;
                                        width: 100%;
                                    " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(229, 62, 62, 0.3)';" 
                                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </div>
                        @else
                            <div style="text-align: center;">
                                <button style="
                                    background: transparent;
                                    color: #739EC9;
                                    border: 2px solid #739EC9;
                                    padding: 0.75rem 1.5rem;
                                    border-radius: 6px;
                                    font-weight: 600;
                                    cursor: pointer;
                                    transition: all 0.3s ease;
                                    width: 100%;
                                " onmouseover="this.style.background='#739EC9'; this.style.color='white';" 
                                   onmouseout="this.style.background='transparent'; this.style.color='#739EC9';">
                                    📖 Read More
                                </button>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div style="
                    grid-column: 1 / -1;
                    text-align: center;
                    padding: 4rem 2rem;
                    background: white;
                    border-radius: 12px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                ">
                    <div style="font-size: 4rem; margin-bottom: 1rem; color: #a0aec0;">📝</div>
                    <h3 style="color: #4a5568; margin-bottom: 1rem;">No Posts Found</h3>
                    <p style="color: #718096; margin-bottom: 2rem;">There are no posts to display at the moment.</p>
                    
                    @if (Auth::check() && in_array(Auth::user()->role, ['admin', 'author']))
                        <a href="{{ route('posts.create') }}" style="
                            background: linear-gradient(135deg, #739EC9, #5a7ea3);
                            color: white;
                            padding: 1rem 2rem;
                            border-radius: 8px;
                            text-decoration: none;
                            font-weight: 600;
                            transition: all 0.3s ease;
                            display: inline-block;
                        " onmouseover="this.style.transform='translateY(-2px)';" onmouseout="this.style.transform='translateY(0)';">
                            Create Your First Post
                        </a>
                    @endif
                </div>
            @endforelse
        </div>

        <!-- Load More Button (if pagination needed) -->
        @if(method_exists($posts, 'hasPages') && $posts->hasPages())
            <div style="text-align: center; margin-top: 3rem;">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

    <script>
        // Filter posts functionality
        function filterPosts(filter) {
            const posts = document.querySelectorAll('.post-card');
            
            posts.forEach(post => {
                const isPublished = post.getAttribute('data-published');
                let show = false;
                
                switch(filter) {
                    case 'all':
                        show = true;
                        break;
                    case 'published':
                        show = isPublished === 'published';
                        break;
                    case 'draft':
                        show = isPublished === 'draft';
                        break;
                }
                
                if (show) {
                    post.style.display = 'block';
                    post.style.animation = 'fadeIn 0.5s ease';
                } else {
                    post.style.display = 'none';
                }
            });
        }

        // Sort posts functionality
        function sortPosts(sortBy) {
            const container = document.getElementById('posts-container');
            const posts = Array.from(container.querySelectorAll('.post-card'));
            
            posts.sort((a, b) => {
                switch(sortBy) {
                    case 'newest':
                        return parseInt(b.getAttribute('data-date')) - parseInt(a.getAttribute('data-date'));
                    case 'oldest':
                        return parseInt(a.getAttribute('data-date')) - parseInt(b.getAttribute('data-date'));
                    case 'title':
                        return a.getAttribute('data-title').localeCompare(b.getAttribute('data-title'));
                    default:
                        return 0;
                }
            });
            
            // Remove all posts and re-add them in sorted order
            posts.forEach(post => post.remove());
            posts.forEach(post => container.appendChild(post));
        }

        // Add fade-in animation
        document.addEventListener('DOMContentLoaded', function() {
            const posts = document.querySelectorAll('.post-card');
            posts.forEach((post, index) => {
                post.style.opacity = '0';
                post.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    post.style.transition = 'all 0.5s ease';
                    post.style.opacity = '1';
                    post.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            #posts-container {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
@endsection