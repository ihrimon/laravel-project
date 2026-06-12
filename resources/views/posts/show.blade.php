@extends('layouts.app')
@section('title', $post->title)

@section('content')
<div class="flex gap-8">

    <!-- Post Detail -->
    <article class="flex-1 bg-white rounded-xl shadow-sm p-8">

        <!-- Category & Status Badge -->
        <div class="flex items-center gap-3 mb-4">
            <span class="bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">
                {{ $post->category->name }}
            </span>
            <span class="text-xs px-2 py-1 rounded-full
                {{ $post->status === 'published'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-yellow-100 text-yellow-700' }}">
                {{ $post->status === 'published' ? 'Published' : 'Draft' }}
            </span>
            <span class="text-gray-400 text-sm">
                {{ $post->created_at->format('d M, Y') }}
            </span>
        </div>

        <!-- Title -->
        <h1 class="text-3xl font-bold mb-6">{{ $post->title }}</h1>

        <!-- Featured Image -->
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 class="w-full h-72 object-cover rounded-xl mb-6">
        @endif

        <!-- Excerpt -->
        @if($post->excerpt)
            <p class="text-gray-500 italic border-l-4 border-indigo-300 pl-4 mb-6">
                {{ $post->excerpt }}
            </p>
        @endif

        <!-- Body -->
        <div class="text-gray-700 leading-relaxed">
            {!! nl2br(e($post->body)) !!}
        </div>

        <!-- Edit / Delete Buttons -->
        <div class="flex gap-3 mt-10 pt-6 border-t">
            <a href="{{ route('posts.edit', $post) }}"
               class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 text-sm">
                ✏️ Edit
            </a>
            <form action="{{ route('posts.destroy', $post) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this post?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-5 py-2 rounded-lg hover:bg-red-600 text-sm">
                    🗑️ Delete
                </button>
            </form>
            <a href="{{ route('posts.index') }}"
               class="px-5 py-2 border rounded-lg text-gray-600 hover:bg-gray-50 text-sm">
                ← Back to Posts
            </a>
        </div>
    </article>

    <!-- Related Posts Sidebar -->
    @if($relatedPosts->isNotEmpty())
        <aside class="w-60 shrink-0">
            <div class="bg-white rounded-xl shadow-sm p-4">
                <h3 class="font-semibold mb-4 text-gray-700">Related Posts</h3>
                @foreach($relatedPosts as $related)
                    <a href="{{ route('posts.show', $related) }}"
                       class="block mb-5 group">
                        @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}"
                                 class="w-full h-24 object-cover rounded-lg mb-2">
                        @endif
                        <p class="text-sm font-medium group-hover:text-indigo-600 leading-snug">
                            {{ $related->title }}
                        </p>
                        <p class="text-xs text-gray-400 mt-1">
                            {{ $related->created_at->format('d M, Y') }}
                        </p>
                    </a>
                @endforeach
            </div>
        </aside>
    @endif

</div>
@endsection