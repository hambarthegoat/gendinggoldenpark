<section id="faq" class="relative scroll-mt-20 bg-white py-20 md:py-28">
    <div class="mx-auto max-w-3xl px-5 md:px-8">
        <div class="text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-gold-600">FAQ</span>
            <h2 class="mt-3 font-display text-3xl font-extrabold text-ink-900 sm:text-4xl">Pertanyaan yang Sering
                Diajukan</h2>
        </div>

        <div class="mt-12 space-y-4">
            @foreach ($faqs as $i => $faq)
                <div x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }"
                    class="overflow-hidden rounded-2xl border border-gold-200 bg-gold-50/60">
                    <button @click="open = !open"
                        class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left">
                        <span class="font-display text-base font-bold text-ink-900">{{ $faq['q'] }}</span>
                        <span
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-white text-gold-600 shadow-sm transition-transform"
                            :class="open ? 'rotate-180' : ''">
                            <x-icon name="chevron-down" class="h-5 w-5" />
                        </span>
                    </button>
                    <div x-show="open" x-collapse x-cloak class="px-6 pb-5 text-sm leading-relaxed text-ink-800/70">
                        {{ $faq['a'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
