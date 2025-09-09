@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h2>Create Post</h2>
    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label><input type="checkbox" name="published" value="1"> Publish</label>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection