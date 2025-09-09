<!DOCTYPE html>
<html>
<head>
    <title>Guest View</title>
</head>
<body>
    <div style="max-width: 600px; margin: 50px auto;">
        <h2>Welcome, Guest!</h2>
        <h3>Published Posts</h3>
        @foreach ($posts as $post)
            <div>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="200">
                @endif
                <h4>{{ $post->title }}</h4>
                <p>{{ Str::limit($post->content, 100) }}</p>
                <p>Author: {{ $post->user->name }} | Category: {{ $post->category->name }}</p>
            </div>
        @endforeach
        <p><a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a></p>
    </div>
</body>
</html>                                                                                                                                                                                                                                                                 