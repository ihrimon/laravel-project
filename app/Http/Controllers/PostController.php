<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // Get all posts with optional filters
    public function index(Request $request)
    {
        $posts = Post::with('category')
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->when($request->category, function ($query, $category) {
                $query->whereHas('category', fn($q) =>
                    $q->where('slug', $category)
                );
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate($request->per_page ?? 10);

        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully.',
            'data' => $posts,
        ], 200);
    }

    // Create a new post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('posts', 'public');
        }

        $validated['slug'] = Str::slug($request->title);

        $post = Post::create($validated);

        $post->load('category');

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully.',
            'data' => $post,
        ], 201);
    }

    // Get a single post
    public function show(Post $post)
    {
        $post->load('category');

        return response()->json([
            'success' => true,
            'message' => 'Post retrieved successfully.',
            'data' => $post,
        ], 200);
    }

    // Update an existing post
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {

            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('posts', 'public');
        }

        $validated['slug'] = Str::slug($request->title);

        $post->update($validated);

        $post->load('category');

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully.',
            'data' => $post,
        ], 200);
    }

    // Delete a post
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully.',
        ], 200);
    }
}