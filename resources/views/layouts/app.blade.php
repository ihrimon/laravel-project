<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta
    name="description"
    content="@yield('description', 'Md Tanzid Haque — full-stack developer. Laravel, React, Next.js.')"
    >
    
    <title>@yield('title', 'tanzid.dev — software developer')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}?v=1">
    <meta name="msapplication-TileImage" content="{{ asset('favicon.ico') }}?v=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&display=swap"
        rel="stylesheet"
    >

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        mono: [
                            "JetBrains Mono",
                            "IBM Plex Mono",
                            "ui-monospace",
                            "SFMono-Regular",
                            "Menlo",
                            "Monaco",
                            "Consolas",
                            "monospace",
                        ],
                    },
                    colors: {
                        canvas: "#f3efe8",
                        soft: "#ebe5dc",
                        card: "#e2dbd0",
                        ink: "#1f1b17",
                        inkDeep: "#0f0d0b",
                        charcoal: "#2f2a24",
                        body: "#3f3a34",
                        mute: "#5f5850",
                        stone: "#6c655d",
                        ash: "#8d857b",
                        hairline: "rgba(31,27,23,0.16)",
                        hairStrong: "#5f5850",

                        nightBg: "#0e0c0c",
                        nightSoft: "#15110f",
                        nightCard: "#1a1715",
                        nightEdge: "rgba(240,232,214,0.14)",
                        nightStrong: "#5a5550",
                        nightInk: "#e8e2d4",
                        nightBody: "#bdb6a8",
                        nightMute: "#7e7a72",

                        primary: "#7b87f5",
                        primaryHover: "#a0aaff",
                    },
                },
            },
        };
    </script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    @stack('styles')

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3TSESWXG19"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-3TSESWXG19');
    </script>
</head>

<body id="top">

    @include('sections.navbar')

    <main>
        @yield('content')
    </main>

    @include('sections.footer')

    <!-- ───────────── BACK TO TOP BUTTON ───────────── -->
    <button
      id="scroll-top"
      type="button"
      class="scroll-top-btn"
      aria-label="Scroll to top"
      title="Back to top"
    >
      ↑
    </button>

    <!-- ───────────── SCRIPTS ───────────── -->
    <script
      data-cfasync="false"
      src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
    ></script>
    <script src="app.js"></script>
</body>
</html>
