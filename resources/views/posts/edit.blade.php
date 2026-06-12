@extends('layouts.app')
@section('title', 'Update Post')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-8">
    <h1 class="text-2xl font-bold mb-6">Update Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Title *</label>
            <input type="text" name="title"
                   value="{{ old('title', $post->title) }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Category *</label>
            <select name="category_id" class="w-full border rounded-lg px-4 py-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Excerpt</label>
            <textarea name="excerpt" rows="2"
                      class="w-full border rounded-lg px-4 py-2">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Content *</label>
            <textarea name="body" rows="8"
                      class="w-full border rounded-lg px-4 py-2">{{ old('body', $post->body) }}</textarea>
        </div>

        @if($post->image)
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Current Image</label>
                <img src="{{ asset('storage/' . $post->image) }}"
                     class="w-40 h-28 object-cover rounded-lg border">
                <p class="text-xs text-gray-400 mt-1">Uploading a new image will replace the current one</p>
            </div>
        @endif

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                {{ $post->image ? 'New Image (optional)' : 'Feature Image' }}
            </label>
            <input type="file" name="image" accept="image/*"
                   class="w-full border rounded-lg px-4 py-2">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded-lg px-4 py-2">
                <option value="draft"
                    {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
                <option value="published"
                    {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>
                    Published
                </option>
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                Update Post
            </button>
            <a href="{{ route('posts.show', $post) }}"
               class="px-6 py-2 border rounded-lg text-gray-600 hover:bg-gray-50">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection