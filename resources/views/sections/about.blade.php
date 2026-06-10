      <!-- ────────── ABOUT / STATS ────────── -->
      <section id="about" class="max-w-[1100px] mx-auto px-5 md:px-8 py-14">
        <div class="flex items-baseline gap-3 mb-2">
          <span class="bk">[x]</span>
          <h2 class="h-section">about — by the numbers</h2>
        </div>
        <div class="border-t rule mt-2"></div>

        <div
    class="mt-5 grid grid-cols-2 md:grid-cols-4 gap-px bg-[rgba(15,0,0,0.12)] dark:bg-[rgba(240,232,214,0.14)]"
    id="stats"
>
    @foreach ($stats as $stat)
        <div class="bg-canvas dark:bg-nightBg p-5 themed">
            <div class="text-[36px] md:text-[44px] font-bold leading-none text-primary">
                {{ $stat->value }}
            </div>

            <div class="mt-3 text-[13px] text-mute dark:text-nightMute leading-snug">
                {{ $stat->label }}
            </div>
        </div>
    @endforeach
</div>
      </section>