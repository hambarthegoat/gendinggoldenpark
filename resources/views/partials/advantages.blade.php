<section id="tentang" class="relative scroll-mt-20 bg-gold-50 py-20 md:py-28">
    <div class="mx-auto max-w-7xl px-5 md:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-gold-600">Mengapa Memilih Kami</span>
            <h2 class="mt-3 font-display text-3xl font-extrabold text-ink-900 sm:text-4xl">
                Keunggulan Gending Golden Park
            </h2>
            <p class="mt-4 text-ink-800/70">
                Kami menghadirkan hunian yang tidak hanya nyaman ditinggali, tapi juga bernilai investasi tinggi
                untuk masa depan keluarga Anda.
            </p>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-3 sm:gap-5 md:mt-14 lg:grid-cols-4 lg:gap-6">
            @foreach ($advantages as $item)
                <div
                    class="group rounded-2xl border border-gold-200/70 bg-white p-4 shadow-sm sm:p-5 md:rounded-3xl md:p-7 transition-all hover:-translate-y-1.5 hover:shadow-xl hover:shadow-gold-200/60">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl md:h-14 md:w-14 md:rounded-2xl bg-gradient-to-br from-gold-400 to-gold-600 text-white shadow-lg shadow-gold-500/30 transition-transform group-hover:scale-110">
                        <x-icon :name="$item['icon']" class="h-5 w-5 md:h-7 md:w-7" />
                    </div>
                    <h3 class="mt-3 font-display text-sm font-bold text-ink-900 md:mt-5 md:text-lg">{{ $item['title'] }}</h3>
                    <p class="mt-1.5 text-xs leading-relaxed text-ink-800/65 md:mt-2 md:text-sm">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
