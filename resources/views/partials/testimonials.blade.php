<section class="relative bg-gold-50 py-20 md:py-28">
    <div class="mx-auto max-w-7xl px-5 md:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-gold-600">Testimoni</span>
            <h2 class="mt-3 font-display text-3xl font-extrabold text-ink-900 sm:text-4xl">Kata Mereka yang Sudah
                Tinggal</h2>
            <p class="mt-4 text-ink-800/70">Kepuasan penghuni adalah prioritas utama kami.</p>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-3 sm:gap-5 md:mt-14 md:grid-cols-3 md:gap-6">
            @foreach ($testimonials as $t)
                <div class="relative flex flex-col rounded-2xl border border-gold-200/70 bg-white p-4 shadow-sm last:odd:col-span-2 sm:p-6 md:rounded-3xl md:p-8 md:last:odd:col-span-1">
                    <x-icon name="quote" class="h-6 w-6 text-gold-300 md:h-8 md:w-8" />
                    <p class="mt-3 flex-1 text-xs leading-relaxed text-ink-800/80 md:mt-4 md:text-sm">&ldquo;{{ $t['quote'] }}&rdquo;</p>
                    <div class="mt-4 flex flex-wrap items-center gap-x-2.5 gap-y-1.5 border-t border-gold-100 pt-3 md:mt-6 md:gap-3 md:pt-5">
                        <div
                            class="flex h-9 w-9 shrink-0 md:h-11 md:w-11 items-center justify-center rounded-full bg-gradient-to-br from-gold-400 to-gold-700 font-display text-sm font-bold text-white">
                            {{ collect(explode(' ', $t['name']))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold text-ink-900 md:text-sm">{{ $t['name'] }}</p>
                            <p class="text-[11px] leading-snug text-ink-800/55 md:text-xs">{{ $t['role'] }}</p>
                        </div>
                        <div class="flex gap-0.5 text-gold-400 md:ml-auto">
                            @for ($i = 0; $i < $t['rating']; $i++)
                                <x-icon name="star" class="h-3 w-3 md:h-3.5 md:w-3.5" />
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
