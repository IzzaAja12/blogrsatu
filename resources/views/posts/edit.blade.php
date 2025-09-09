@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h2>Edit Post</h2>
    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" required>{{ $post->content }}</textarea>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label><input type="checkbox" name="published" value="1" {{ $post->published ? 'checked' : '' }}> Publish</label>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="200">
            @endif
        </div>
        <button type="submit">Update</button>
    </form>
@endsection