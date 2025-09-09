@extends('layouts.app') 

@section('title', 'Welcome')

@section('content')
    <div class="welcome-hero">
        <h2>Welcome to My Professional Blog</h2>
        <p>Discover insightful articles, share your thoughts, and join our growing community of writers and readers. Your journey to knowledge starts here!</p>
        
        <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem; flex-wrap: wrap;">
            <a href="{{ route('posts.index') }}" style="
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
                Explore Articles
            </a>
            
            @guest
                <a href="{{ route('register') }}" style="
                    background: transparent;
                    color: #739EC9;
                    padding: 1rem 2rem;
                    border: 2px solid #739EC9;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    display: inline-block;
                " onmouseover="this.style.background='#739EC9'; this.style.color='white'; this.style.transform='translateY(-2px)';" 
                   onmouseout="this.style.background='transparent'; this.style.color='#739EC9'; this.style.transform='translateY(0)';">
                    Join Our Community
                </a>
            @else
                <a href="{{ route('dashboard') }}" style="
                    background: transparent;
                    color: #739EC9;
                    padding: 1rem 2rem;
                    border: 2px solid #739EC9;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    display: inline-block;
                " onmouseover="this.style.background='#739EC9'; this.style.color='white'; this.style.transform='translateY(-2px)';" 
                   onmouseout="this.style.background='transparent'; this.style.color='#739EC9'; this.style.transform='translateY(0)';">
                    Go to Dashboard
                </a>
            @endguest
        </div>
    </div>

    <!-- Features Section -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 3rem;">
        <div style="
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            border-top: 4px solid #739EC9;
        " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0, 0, 0, 0.15)';" 
           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
            <div style="
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, #739EC9, #8fb3d4);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: white;
                font-size: 1.5rem;
                font-weight: bold;
            ">📚</div>
            <h3 style="color: #2d3748; margin-bottom: 1rem; font-size: 1.3rem;">Quality Content</h3>
            <p style="color: #4a5568; line-height: 1.6;">Discover well-researched articles and insights from our community of passionate writers.</p>
        </div>

        <div style="
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            border-top: 4px solid #739EC9;
        " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0, 0, 0, 0.15)';" 
           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
            <div style="
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, #739EC9, #8fb3d4);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: white;
                font-size: 1.5rem;
                font-weight: bold;
            ">👥</div>
            <h3 style="color: #2d3748; margin-bottom: 1rem; font-size: 1.3rem;">Active Community</h3>
            <p style="color: #4a5568; line-height: 1.6;">Join discussions, share your thoughts, and connect with like-minded individuals.</p>
        </div>

        <div style="
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            border-top: 4px solid #739EC9;
        " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0, 0, 0, 0.15)';" 
           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
            <div style="
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, #739EC9, #8fb3d4);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: white;
                font-size: 1.5rem;
                font-weight: bold;
            ">✍️</div>
            <h3 style="color: #2d3748; margin-bottom: 1rem; font-size: 1.3rem;">Share Your Voice</h3>
            <p style="color: #4a5568; line-height: 1.6;">Create and publish your own articles with our user-friendly writing tools.</p>
        </div>
    </div>
    

    

    <!-- Call to Action -->
    @guest
        <div style="
            background: linear-gradient(135deg, #739EC9, #5a7ea3);
            color: white;
            padding: 3rem 2rem;
            border-radius: 16px;
            text-align: center;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
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
                <h3 style="font-size: 1.8rem; margin-bottom: 1rem; color: white;">Ready to Get Started?</h3>
                <p style="font-size: 1.1rem; margin-bottom: 2rem; color: rgba(255, 255, 255, 0.9); max-width: 600px; margin-left: auto; margin-right: auto;">Join thousands of writers and readers who are already part of our thriving community. Your story matters!</p>
                <a href="{{ route('register') }}" style="
                    background: white;
                    color: #739EC9;
                    padding: 1rem 2rem;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: 600;
                    display: inline-block;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                " onmouseover="this.style.transform='translateY(-3px) scale(1.05)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.2)';" 
                   onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">
                    Create Your Account Today
                </a>
            </div>
        </div>
    @endguest
@endsection