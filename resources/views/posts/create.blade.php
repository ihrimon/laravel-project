@extends('layouts.app')
@section('title', 'Create Post')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-8">
    <h1 class="text-2xl font-bold mb-6">Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Title *</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-400
                          @error('title') border-red-400 @enderror">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Category *</label>
            <select name="category_id"
                    class="w-full border rounded-lg px-4 py-2 @error('category_id') border-red-400 @enderror">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Summary</label>
            <textarea name="excerpt" rows="2"
                      class="w-full border rounded-lg px-4 py-2">{{ old('excerpt') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Content *</label>
            <textarea name="body" rows="8"
                      class="w-full border rounded-lg px-4 py-2 @error('body') border-red-400 @enderror">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Feature Image</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full border rounded-lg px-4 py-2">
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded-lg px-4 py-2">
                <option value="draft"
                    {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
                <option value="published"
                    {{ old('status') == 'published' ? 'selected' : '' }}>
                    Published
                </option>
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                Create Post
            </button>
            <a href="{{ route('posts.index') }}"
               class="px-6 py-2 border rounded-lg text-gray-600 hover:bg-gray-50">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection