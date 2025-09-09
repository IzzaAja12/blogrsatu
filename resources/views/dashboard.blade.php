@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Welcome Header -->
        <div style="
            background: linear-gradient(135deg, #739EC9, #5a7ea3);
            color: white;
            padding: 3rem 2rem;
            border-radius: 16px;
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(115, 158, 201, 0.3);
        ">
            <div style="
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 20\"><defs><pattern id=\"grain\" width=\"100\" height=\"20\" patternUnits=\"userSpaceOnUse\"><circle cx=\"10\" cy=\"10\" r=\"1\" fill=\"white\" opacity=\"0.1\"/></pattern></defs><rect width=\"100\" height=\"20\" fill=\"url(%23grain)\"/></svg>
            </div>
            
            <div style="position: relative; z-index: 1;">
                <div style="
                    width: 100px;
                    height: 100px;
                    background: rgba(255, 255, 255, 0.2);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 1.5rem;
                    color: white;
                    font-size: 3rem;
                    font-weight: 700;
                    backdrop-filter: blur(10px);
                    border: 3px solid rgba(255, 255, 255, 0.3);
                ">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                
                <h1 style="font-size: 2.5rem; margin-bottom: 1rem; color: white;">
                    Welcome back, {{ Auth::user()->name }}! 👋
                </h1>
                
                <p style="font-size: 1.2rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 1rem;">
                    Ready to create something amazing today?
                </p>
                
                <div style="
                    display: inline-flex;
                    align-items: center;
                    gap: 1rem;
                    background: rgba(255, 255, 255, 0.1);
                    padding: 0.75rem 1.5rem;
                    border-radius: 25px;
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255, 255, 255, 0.2);
                ">
                    <span style="font-size: 1.2rem;">
                        @if(Auth::user()->role === 'admin')
                            👑 Administrator
                        @elseif(Auth::user()->role === 'author')
                            ✍️ Author
                        @else
                            👤 Reader
                        @endif
                    </span>
                    <div style="width: 1px; height: 20px; background: rgba(255, 255, 255, 0.3);"></div>
                    <span style="color: rgba(255, 255, 255, 0.8);">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div style="margin-bottom: 3rem;">
            <h2 style="
                color: #2d3748;
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            ">
                🚀 Quick Actions
            </h2>
            
            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
            ">
                @if (in_array(Auth::user()->role, ['admin', 'author']))
                    <a href="{{ route('posts.create') }}" style="
                        background: linear-gradient(135deg, #48bb78, #38a169);
                        color: white;
                        padding: 2rem;
                        border-radius: 12px;
                        text-decoration: none;
                        transition: all 0.3s ease;
                        box-shadow: 0 4px 6px rgba(72, 187, 120, 0.3);
                        position: relative;
                        overflow: hidden;
                    " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(72, 187, 120, 0.4)';"
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(72, 187, 120, 0.3)';">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem;">✏️</div>
                        <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; color: white;">Create New Post</h3>
                        <p style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; margin: 0;">
                            Start writing your next amazing article
                        </p>
                    </a>
                @endif

                <a href="{{ route('posts.index') }}" style="
                    background: linear-gradient(135deg, #739EC9, #5a7ea3);
                    color: white;
                    padding: 2rem;
                    border-radius: 12px;
                    text-decoration: none;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 6px rgba(115, 158, 201, 0.3);
                    position: relative;
                    overflow: hidden;
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(115, 158, 201, 0.4)';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(115, 158, 201, 0.3)';">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">📚</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; color: white;">Browse Posts</h3>
                    <p style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; margin: 0;">
                        Explore all published articles
                    </p>
                </a>

                <a href="#" style="
                    background: linear-gradient(135deg, #ed8936, #dd6b20);
                    color: white;
                    padding: 2rem;
                    border-radius: 12px;
                    text-decoration: none;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 6px rgba(237, 137, 54, 0.3);
                    position: relative;
                    overflow: hidden;
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(237, 137, 54, 0.4)';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(237, 137, 54, 0.3)';">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">⚙️</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; color: white;">Account Settings</h3>
                    <p style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; margin: 0;">
                        Manage your profile and preferences
                    </p>
                </a>

                <a href="#" style="
                    background: linear-gradient(135deg, #9f7aea, #805ad5);
                    color: white;
                    padding: 2rem;
                    border-radius: 12px;
                    text-decoration: none;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 6px rgba(159, 122, 234, 0.3);
                    position: relative;
                    overflow: hidden;
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(159, 122, 234, 0.4)';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(159, 122, 234, 0.3)';">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">📊</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; color: white;">Analytics</h3>
                    <p style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; margin: 0;">
                        View your writing statistics
                    </p>
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div style="margin-bottom: 3rem;">
            <h2 style="
                color: #2d3748;
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            ">
                📈 Your Statistics
            </h2>
            
            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1.5rem;
            ">
                <!-- Posts Count -->
                <div style="
                    background: white;
                    padding: 2rem;
                    border-radius: 12px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    border-top: 4px solid #48bb78;
                    transition: all 0.3s ease;
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.15)';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #48bb78;">📝</div>
                    <div style="font-size: 2rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem;">
                        {{ Auth::user()->posts ? Auth::user()->posts->count() : 0 }}
                    </div>
                    <div style="color: #718096; font-weight: 600;">Total Posts</div>
                </div>

                <!-- Published Posts -->
                <div style="
                    background: white;
                    padding: 2rem;
                    border-radius: 12px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    border-top: 4px solid #739EC9;
                    transition: all 0.3s ease;
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.15)';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #739EC9;">🚀</div>
                    <div style="font-size: 2rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem;">
                        {{ Auth::user()->posts ? Auth::user()->posts->where('published', true)->count() : 0 }}
                    </div>
                    <div style="color: #718096; font-weight: 600;">Published</div>
                </div>

                <!-- Draft Posts -->
                <div style="
                    background: white;
                    padding: 2rem;
                    border-radius: 12px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    border-top: 4px solid #ed8936;
                    transition: all 0.3s ease;
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.15)';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #ed8936;">📄</div>
                    <div style="font-size: 2rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem;">
                        {{ Auth::user()->posts ? Auth::user()->posts->where('published', false)->count() : 0 }}
                    </div>
                    <div style="color: #718096; font-weight: 600;">Drafts</div>
                </div>

                <!-- Member Since -->
                <div style="
                    background: white;
                    padding: 2rem;
                    border-radius: 12px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    border-top: 4px solid #9f7aea;
                    transition: all 0.3s ease;
                " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.15)';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #9f7aea;">⏱️</div>
                    <div style="font-size: 1.2rem; font-weight: 700; color: #2d3748; margin-bottom: 0.5rem;">
                        {{ Auth::user()->created_at->format('M Y') }}
                    </div>
                    <div style="color: #718096; font-weight: 600;">Member Since</div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div style="margin-bottom: 3rem;">
            <h2 style="
                color: #2d3748;
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            ">
                🕒 Recent Activity
            </h2>
            
            <div style="
                background: white;
                border-radius: 12px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            ">
                @if(Auth::user()->posts && Auth::user()->posts->count() > 0)
                    @foreach(Auth::user()->posts->take(5) as $post)
                        <div style="
                            padding: 1.5rem;
                            border-bottom: 1px solid #e2e8f0;
                            display: flex;
                            align-items: center;
                            gap: 1rem;
                            transition: all 0.3s ease;
                        " onmouseover="this.style.background='#f8fafc';" onmouseout="this.style.background='white';">
                            <div style="
                                width: 50px;
                                height: 50px;
                                background: {{ $post->published ? 'linear-gradient(135deg, #48bb78, #38a169)' : 'linear-gradient(135deg, #ed8936, #dd6b20)' }};
                                border-radius: 8px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-size: 1.5rem;
                                flex-shrink: 0;
                            ">
                                {{ $post->published ? '📝' : '📄' }}
                            </div>
                            
                            <div style="flex: 1; min-width: 0;">
                                <h4 style="
                                    color: #2d3748;
                                    margin-bottom: 0.5rem;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                ">{{ $post->title }}</h4>
                                <p style="
                                    color: #718096;
                                    font-size: 0.875rem;
                                    margin: 0;
                                    display: flex;
                                    align-items: center;
                                    gap: 1rem;
                                ">
                                    <span>{{ $post->published ? 'Published' : 'Draft' }}</span>
                                    <span>•</span>
                                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                                    <span>•</span>
                                    <span>{{ $post->category->name ?? 'Uncategorized' }}</span>
                                </p>
                            </div>
                            
                            <div style="display: flex; gap: 0.5rem; flex-shrink: 0;">
                                <a href="{{ route('posts.edit', $post) }}" style="
                                    background: #739EC9;
                                    color: white;
                                    padding: 0.5rem;
                                    border-radius: 6px;
                                    text-decoration: none;
                                    transition: all 0.3s ease;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                " onmouseover="this.style.background='#5a7ea3'; this.style.transform='scale(1.05)';"
                                   onmouseout="this.style.background='#739EC9'; this.style.transform='scale(1)';">
                                    ✏️
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div style="
                        padding: 3rem;
                        text-align: center;
                        color: #718096;
                    ">
                        <div style="font-size: 3rem; margin-bottom: 1rem; color: #a0aec0;">📝</div>
                        <h3 style="color: #4a5568; margin-bottom: 1rem;">No Posts Yet</h3>
                        <p style="margin-bottom: 2rem;">You haven't created any posts yet. Start writing your first article!</p>
                        @if (in_array(Auth::user()->role, ['admin', 'author']))
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
                @endif
            </div>
        </div>

        <!-- Tips for Users -->
        <div style="margin-bottom: 3rem;">
            <h2 style="
                color: #2d3748;
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            ">
                💡 Tips & Suggestions
            </h2>
            
            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 1.5rem;
            ">
                <div style="
                    background: linear-gradient(135deg, #f0fff4, #e6fffa);
                    border: 1px solid #9ae6b4;
                    border-left: 4px solid #48bb78;
                    padding: 1.5rem;
                    border-radius: 8px;
                ">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <div style="font-size: 1.5rem;">✍️</div>
                        <h3 style="color: #22543d; margin: 0; font-size: 1.2rem;">Writing Tips</h3>
                    </div>
                    <ul style="color: #2f855a; margin: 0; padding-left: 1rem;">
                        <li style="margin-bottom: 0.5rem;">Keep your titles engaging and descriptive</li>
                        <li style="margin-bottom: 0.5rem;">Use images to make posts more appealing</li>
                        <li>Break up long text with headings and paragraphs</li>
                    </ul>
                </div>

                <div style="
                    background: linear-gradient(135deg, #eff6ff, #dbeafe);
                    border: 1px solid #93c5fd;
                    border-left: 4px solid #3b82f6;
                    padding: 1.5rem;
                    border-radius: 8px;
                ">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <div style="font-size: 1.5rem;">🚀</div>
                        <h3 style="color: #1e3a8a; margin: 0; font-size: 1.2rem;">Growth Tips</h3>
                    </div>
                    <ul style="color: #1d4ed8; margin: 0; padding-left: 1rem;">
                        <li style="margin-bottom: 0.5rem;">Publish consistently to build an audience</li>
                        <li style="margin-bottom: 0.5rem;">Engage with other writers' content</li>
                        <li>Share your posts on social media</li>
                    </ul>
                </div>

                <div style="
                    background: linear-gradient(135deg, #fefce8, #fef3c7);
                    border: 1px solid #fbbf24;
                    border-left: 4px solid #f59e0b;
                    padding: 1.5rem;
                    border-radius: 8px;
                ">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <div style="font-size: 1.5rem;">⚙️</div>
                        <h3 style="color: #92400e; margin: 0; font-size: 1.2rem;">Platform Tips</h3>
                    </div>
                    <ul style="color: #b45309; margin: 0; padding-left: 1rem;">
                        <li style="margin-bottom: 0.5rem;">Complete your profile information</li>
                        <li style="margin-bottom: 0.5rem;">Use categories to organize your content</li>
                        <li>Save drafts before publishing</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Account Information -->
        <div style="margin-bottom: 3rem;">
            <h2 style="
                color: #2d3748;
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            ">
                👤 Account Information
            </h2>
            
            <div style="
                background: white;
                border-radius: 12px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 2rem;
            ">
                <div style="
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 2rem;
                ">
                    <div>
                        <h4 style="color: #4a5568; margin-bottom: 1rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                            👤 Personal Information
                        </h4>
                        <div style="space-y: 0.75rem;">
                            <div style="margin-bottom: 0.75rem;">
                                <span style="color: #718096; font-size: 0.875rem;">Full Name:</span>
                                <div style="color: #2d3748; font-weight: 600;">{{ Auth::user()->name }}</div>
                            </div>
                            <div style="margin-bottom: 0.75rem;">
                                <span style="color: #718096; font-size: 0.875rem;">Email Address:</span>
                                <div style="color: #2d3748; font-weight: 600;">{{ Auth::user()->email }}</div>
                            </div>
                            <div style="margin-bottom: 0.75rem;">
                                <span style="color: #718096; font-size: 0.875rem;">Account Type:</span>
                                <div style="color: #2d3748; font-weight: 600;">
                                    @if(Auth::user()->role === 'admin')
                                        👑 Administrator
                                    @elseif(Auth::user()->role === 'author')
                                        ✍️ Author
                                    @else
                                        👤 Reader
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h4 style="color: #4a5568; margin-bottom: 1rem; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                            📊 Account Activity
                        </h4>
                        <div style="space-y: 0.75rem;">
                            <div style="margin-bottom: 0.75rem;">
                                <span style="color: #718096; font-size: 0.875rem;">Member Since:</span>
                                <div style="color: #2d3748; font-weight: 600;">{{ Auth::user()->created_at->format('F d, Y') }}</div>
                            </div>
                            <div style="margin-bottom: 0.75rem;">
                                <span style="color: #718096; font-size: 0.875rem;">Last Updated:</span>
                                <div style="color: #2d3748; font-weight: 600;">{{ Auth::user()->updated_at->format('F d, Y') }}</div>
                            </div>
                            <div style="margin-bottom: 0.75rem;">
                                <span style="color: #718096; font-size: 0.875rem;">Status:</span>
                                <div style="color: #48bb78; font-weight: 600;">✅ Active</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e2e8f0; text-align: center;">
                    <a href="#" style="
                        background: transparent;
                        color: #739EC9;
                        border: 2px solid #739EC9;
                        padding: 1rem 2rem;
                        border-radius: 8px;
                        text-decoration: none;
                        font-weight: 600;
                        transition: all 0.3s ease;
                        display: inline-block;
                        margin-right: 1rem;
                    " onmouseover="this.style.background='#739EC9'; this.style.color='white';" 
                       onmouseout="this.style.background='transparent'; this.style.color='#739EC9';">
                        ⚙️ Edit Profile
                    </a>
                    
                    <a href="#" style="
                        background: transparent;
                        color: #e53e3e;
                        border: 2px solid #e53e3e;
                        padding: 1rem 2rem;
                        border-radius: 8px;
                        text-decoration: none;
                        font-weight: 600;
                        transition: all 0.3s ease;
                        display: inline-block;
                    " onmouseover="this.style.background='#e53e3e'; this.style.color='white';" 
                       onmouseout="this.style.background='transparent'; this.style.color='#e53e3e';">
                        🔒 Change Password
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add some interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add floating animation to the avatar
            const avatar = document.querySelector('.header-icon');
            if (avatar) {
                setInterval(() => {
                    avatar.style.transform = 'translateY(-5px)';
                    setTimeout(() => {
                        avatar.style.transform = 'translateY(0)';
                    }, 1000);
                }, 3000);
            }

            // Add click handlers for action cards
            const actionCards = document.querySelectorAll('a[href="#"]');
            actionCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    e.preventDefault();
                    const cardText = this.textContent.trim();
                    if (cardText.includes('Settings') || cardText.includes('Analytics') || cardText.includes('Profile') || cardText.includes('Password')) {
                        alert('This feature is coming soon! 🚧');
                    }
                });
            });

            // Animate statistics cards on load
            const statCards = document.querySelectorAll('[style*="border-top: 4px solid"]');
            statCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Add typing effect to welcome message
            const welcomeTitle = document.querySelector('h1');
            if (welcomeTitle) {
                const text = welcomeTitle.textContent;
                welcomeTitle.textContent = '';
                let index = 0;
                
                function typeWriter() {
                    if (index < text.length) {
                        welcomeTitle.textContent += text.charAt(index);
                        index++;
                        setTimeout(typeWriter, 50);
                    }
                }
                
                setTimeout(typeWriter, 500);
            }
        });
    </script>
@endsection