@extends('layouts.app')
@section('title', 'Posts')

@section('content')
<div class="flex gap-8">

    <div class="flex-1">
        <!-- Search -->
        <form method="GET" action="{{ route('posts.index') }}"
              class="mb-6 flex gap-2">
            <input type="text" name="search"
                   value="{{ request('search') }}"
                   placeholder="Search..."
                   class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg">
                Search
            </button>
        </form>

        <!-- Posts -->
        @forelse($posts as $post)
            <div class="bg-white rounded-xl shadow-sm mb-5 p-5 flex gap-4">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         class="w-32 h-24 object-cover rounded-lg shrink-0">
                @endif
                <div class="flex-1">
                    <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full">
                        {{ $post->category->name }}
                    </span>
                    
                    <h2 class="text-lg font-semibold mt-2">
                        <a href="{{ route('posts.show', $post) }}"
                           class="hover:text-indigo-600">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-gray-500 text-sm mt-1">
                        {{ Str::limit($post->excerpt, 100) }}
                    </p>
                    <div class="flex gap-4 mt-3">
                        <a href="{{ route('posts.edit', $post) }}"
                           class="text-sm text-indigo-500 hover:underline py-1">
                            Edit
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this post?')">
                            @csrf @method('DELETE')
                            <button class="text-sm text-red-400 hover:underline py-1">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-400 py-20">No posts available.</p>
        @endforelse

        {{ $posts->links() }}
    </div>

    <!-- Sidebar -->
    <aside class="w-52 shrink-0">
        <div class="bg-white rounded-xl shadow-sm p-4">
            <h3 class="font-semibold mb-3">Categories</h3>
            <a href="{{ route('posts.index') }}"
               class="block text-sm py-1 text-gray-600 hover:text-indigo-600">
                All Posts
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('posts.index', ['category' => $cat->slug]) }}"
                   class="block text-sm py-1 text-gray-600 hover:text-indigo-600">
                    {{ $cat->name }} ({{ $cat->posts_count }})
                </a>
            @endforeach
        </div>
    </aside>

</div>
@endsection