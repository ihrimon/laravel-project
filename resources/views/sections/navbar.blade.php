<!-- ────────── NEWS STRIP ────────── -->
<div class="border-b rule">
    <div
        class="max-w-[1100px] mx-auto px-5 md:px-8 py-2 flex items-center gap-3 text-[13px]"
    >
        <span
            class="inline-flex items-center gap-1 px-2 py-0.5 bg-ink text-canvas dark:bg-nightInk dark:text-nightBg rounded-sm text-[11px] font-medium tracking-wide"
        >
            NEWS
        </span>

        <span class="text-mute dark:text-nightMute truncate">
            <span class="bk">[+]</span>
            currently shipping production Laravel/Reverb at Kiwii IT —
            <a href="#contact" class="ulink">open to new work</a>
        </span>
    </div>
</div>

<!-- ────────── PRIMARY NAV ────────── -->
<header
    class="border-b rule sticky top-0 bg-canvas/95 dark:bg-nightBg/95 backdrop-blur z-30 themed"
>
    <nav
        class="max-w-[1100px] mx-auto px-5 md:px-8 h-14 flex items-center justify-between gap-6"
    >
        <!-- Logo -->
        <a
            href="#top"
            class="flex items-center gap-3 group"
            aria-label="tanzid.dev home"
        >
            <span class="font-bold text-[15px] tracking-tight">
                <span class="text-primary">[~]</span>
                tanzid<span class="text-primary">.dev</span>
            </span>
        </a>

        <!-- Navigation -->
        <ul class="hidden md:flex items-center gap-6 text-[14px] font-medium">
            <li>
                <a class="hover:text-primary transition" href="#about">
                    <span class="bk">~/</span>about
                </a>
            </li>

            <li>
                <a class="hover:text-primary transition" href="#work">
                    <span class="bk">~/</span>work
                </a>
            </li>

            <li>
                <a class="hover:text-primary transition" href="#projects">
                    <span class="bk">~/</span>projects
                </a>
            </li>

            <li>
                <a class="hover:text-primary transition" href="#writing">
                    <span class="bk">~/</span>writing
                </a>
            </li>

            <li>
                <a class="hover:text-primary transition" href="#contact">
                    <span class="bk">~/</span>contact
                </a>
            </li>
        </ul>

        <!-- Actions -->
        <div class="flex items-center gap-2">
            <button
                id="theme-toggle"
                aria-label="Toggle theme"
                class="h-9 w-9 grid place-items-center rounded-sm border rule-strong text-ink dark:text-nightInk hover:border-primary hover:text-primary transition"
            >
                <span class="block dark:hidden text-[14px] font-bold">
                    [☀]
                </span>

                <span class="hidden dark:block text-[14px] font-bold">
                    [☾]
                </span>
            </button>

            <a
                href="#contact"
                class="inline-flex items-center gap-1.5 h-9 px-4 rounded-sm bg-ink text-canvas dark:bg-nightInk dark:text-nightBg text-[13px] font-medium hover:bg-primary hover:text-canvas dark:hover:bg-primary dark:hover:text-canvas transition"
            >
                ./hire
                <span aria-hidden="true">↓</span>
            </a>
        </div>
    </nav>
</header>