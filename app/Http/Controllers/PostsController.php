<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    // Tampilkan semua post (untuk guest hanya yang published)
    public function index()
    {
        $posts = Post::where('published', true)->with(['user', 'category'])->get();
        return view('posts.index', compact('posts'));
    }

    // Form buat post baru (admin dan author)
    public function create()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'author'])) {
            abort(403, 'Unauthorized');
        }
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    // Simpan post baru
    public function store(Request $request)
    {
        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'author'])) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'published' => 'boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'published' => $request->published ?? false,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created.');
    }

    // Form edit post (hanya admin)
    public function edit(Post $post)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    // Update post (hanya admin)
    public function update(Request $request, Post $post)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'published' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Nullable saat edit
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'published' => $request->published ?? false,
        ];

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete('public/' . $post->image); // Hapus gambar lama
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated.');
    }

    // Hapus post (hanya admin)
    public function destroy(Post $post)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        if ($post->image) {
            Storage::delete('public/' . $post->image); // Hapus gambar saat delete post
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }
}