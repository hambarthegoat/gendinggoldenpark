<section id="fasilitas" class="relative scroll-mt-20 overflow-hidden bg-ink-900 py-20 md:py-28">
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -top-24 left-1/3 h-96 w-96 rounded-full bg-gold-600/20 blur-3xl"></div>
        <div class="absolute inset-0 bg-noise opacity-20"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-5 md:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-gold-400">Kenyamanan Terpadu</span>
            <h2 class="mt-3 font-display text-3xl font-extrabold text-white sm:text-4xl">Fasilitas Lengkap</h2>
            <p class="mt-4 text-gold-100/70">Setiap detail dirancang untuk mendukung gaya hidup sehat dan aktif
                keluarga modern.</p>
        </div>

        <div class="mt-10 grid grid-cols-3 gap-2.5 sm:gap-4 md:mt-14 md:gap-5 lg:grid-cols-4">
            @foreach ($facilities as $facility)
                <div
                    class="group rounded-2xl border border-white/10 bg-white/5 p-3 text-center sm:p-5 md:p-6 backdrop-blur-sm transition-all hover:border-gold-500/50 hover:bg-white/10">
                    <div
                        class="mx-auto flex h-10 w-10 items-center justify-center rounded-xl md:h-14 md:w-14 md:rounded-2xl bg-gold-500/15 text-gold-300 ring-1 ring-gold-500/30 transition-transform group-hover:scale-110">
                        <x-icon :name="$facility['icon']" class="h-5 w-5 md:h-7 md:w-7" />
                    </div>
                    <h3 class="mt-3 font-display text-xs font-bold text-white md:mt-4 md:text-sm">{{ $facility['name'] }}</h3>
                    <p class="mt-1 text-[10px] leading-snug text-gold-100/55 md:mt-1.5 md:text-xs md:leading-relaxed">{{ $facility['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
