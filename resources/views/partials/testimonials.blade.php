<section class="relative bg-gold-50 py-20 md:py-28">
    <div class="mx-auto max-w-7xl px-5 md:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-gold-600">Testimoni</span>
            <h2 class="mt-3 font-display text-3xl font-extrabold text-ink-900 sm:text-4xl">Kata Mereka yang Sudah
                Tinggal</h2>
            <p class="mt-4 text-ink-800/70">Kepuasan penghuni adalah prioritas utama kami.</p>
        </div>

        <div class="mt-14 grid gap-6 lg:grid-cols-3">
            @foreach ($testimonials as $t)
                <div class="relative flex flex-col rounded-3xl border border-gold-200/70 bg-white p-8 shadow-sm">
                    <x-icon name="quote" class="h-8 w-8 text-gold-300" />
                    <p class="mt-4 flex-1 text-sm leading-relaxed text-ink-800/80">&ldquo;{{ $t['quote'] }}&rdquo;</p>
                    <div class="mt-6 flex items-center gap-3 border-t border-gold-100 pt-5">
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-gold-400 to-gold-700 font-display text-sm font-bold text-white">
                            {{ collect(explode(' ', $t['name']))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}
                        </div>
                        <div>
                            <p class="text-sm font-bold text-ink-900">{{ $t['name'] }}</p>
                            <p class="text-xs text-ink-800/55">{{ $t['role'] }}</p>
                        </div>
                        <div class="ml-auto flex gap-0.5 text-gold-400">
                            @for ($i = 0; $i < $t['rating']; $i++)
                                <x-icon name="star" class="h-3.5 w-3.5" />
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
