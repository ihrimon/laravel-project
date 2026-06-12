<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Blog')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white shadow sticky top-0 z-10">
        <div class="max-w-5xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('posts.index') }}"
               class="text-xl font-bold text-indigo-600">
                Laravel Blog
            </a>
            <a href="{{ route('posts.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">
                + Create Post
            </a>
        </div>
    </nav>

    @if(session('success'))
        <div class="max-w-5xl mx-auto px-4 mt-4">
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main class="max-w-5xl mx-auto px-4 py-8">
        @yield('content')
    </main>

</body>
</html>