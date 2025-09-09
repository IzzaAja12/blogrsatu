@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h2>Posts</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @foreach ($posts as $post)
        <div class="post">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="200">
            @endif
            <h3>{{ $post->title }}</h3>
            <p>{{ Str::limit($post->content, 100) }}</p>
            <p>Author: {{ $post->user->name }} | Category: {{ $post->category->name }}</p>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <div class="post-actions">
                    <a href="{{ route('posts.edit', $post) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
@endsection