<section class="relative overflow-hidden bg-ink-900 pt-32 pb-24 md:pt-40 md:pb-32">
    <!-- Decorative gradient background -->
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -top-32 -right-32 h-[28rem] w-[28rem] rounded-full bg-gold-500/30 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 h-72 w-72 rounded-full bg-gold-700/30 blur-3xl"></div>
        <div class="absolute inset-0 bg-noise opacity-30"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-ink-900/0 via-ink-900/40 to-ink-900"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-5 md:px-8">
        <div class="grid items-center gap-14 lg:grid-cols-2">
            <div class="animate-fade-up">
                <span
                    class="inline-flex items-center gap-2 rounded-full bg-gold-500/15 px-4 py-1.5 text-sm font-semibold text-gold-300 ring-1 ring-gold-500/40">
                    <x-icon name="sparkles" class="h-4 w-4" />
                    {{ $settings->hero_badge }}
                </span>

                <h1 class="mt-6 font-display text-4xl font-extrabold leading-[1.1] text-white sm:text-5xl lg:text-6xl">
                    {{ $settings->hero_headline_prefix }}
                    <span class="bg-gradient-to-r from-gold-300 via-gold-400 to-gold-600 bg-clip-text text-transparent">
                        {{ $settings->hero_headline_highlight }}
                    </span>
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-relaxed text-gold-100/80">
                    {{ $settings->hero_subtext }}
                </p>

                <div class="mt-9 flex flex-col gap-4 sm:flex-row sm:justify-start">
                    <a href="#tipe-rumah"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-gold-400 to-gold-600 px-7 py-3.5 text-base font-bold text-ink-900 shadow-xl shadow-gold-600/30 hover:-translate-y-0.5 hover:shadow-gold-500/40 transition-all">
                        {{ $settings->hero_cta_primary_label }}
                        <x-icon name="arrow-right" class="h-5 w-5" />
                    </a>
                    <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode('Halo, saya ingin tanya-tanya tentang '.$settings->company_name) }}"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-white/25 bg-white/5 px-7 py-3.5 text-base font-bold text-white backdrop-blur-sm hover:bg-white/10 transition-colors">
                        <x-icon name="whatsapp" class="h-5 w-5" />
                        {{ $settings->hero_cta_secondary_label }}
                    </a>
                </div>

                <div class="mt-12 grid grid-cols-2 gap-6 sm:grid-cols-4">
                    @foreach ($stats as $stat)
                        <div>
                            <p class="font-display text-2xl font-extrabold text-gold-300 sm:text-3xl">{{ $stat['value'] }}</p>
                            <p class="mt-1 text-sm text-gold-100/60">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative animate-fade-up [animation-delay:150ms]">
                <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-br from-gold-400/40 to-gold-700/10 blur-2xl">
                </div>
                <div
                    class="relative aspect-[4/5] w-full overflow-hidden rounded-[2rem] bg-gradient-to-br from-gold-200 via-gold-400 to-gold-700 shadow-2xl ring-1 ring-white/10">
                    <div class="absolute inset-0 bg-noise opacity-20"></div>
                    <svg viewBox="0 0 400 500" class="absolute inset-0 h-full w-full" preserveAspectRatio="xMidYMax slice">
                        <rect width="400" height="500" fill="url(#skyGrad)" />
                        <defs>
                            <linearGradient id="skyGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0" stop-color="#fde68a" />
                                <stop offset="1" stop-color="#b45309" />
                            </linearGradient>
                        </defs>
                        <circle cx="315" cy="95" r="42" fill="#fffbea" fill-opacity="0.85" />
                        <path d="M0 300 L60 250 L120 300 L120 500 L0 500 Z" fill="#5c2a0a" fill-opacity="0.35" />
                        <path d="M90 320 L190 240 L290 320 L290 500 L90 500 Z" fill="#35281a" fill-opacity="0.55" />
                        <rect x="150" y="380" width="35" height="60" fill="#fde68a" fill-opacity="0.6" rx="2" />
                        <rect x="205" y="380" width="35" height="60" fill="#fde68a" fill-opacity="0.6" rx="2" />
                        <path d="M260 340 L340 270 L400 320 L400 500 L260 500 Z" fill="#201a10" fill-opacity="0.45" />
                        <rect x="0" y="440" width="400" height="60" fill="#201a10" fill-opacity="0.5" />
                        <path d="M0 445 q50 -20 100 0 t100 0 t100 0 t100 0" stroke="#fffbea" stroke-opacity="0.3"
                            stroke-width="3" fill="none" />
                    </svg>
                </div>

                <div class="absolute -bottom-6 -left-6 hidden rounded-2xl bg-white p-4 shadow-xl sm:flex items-center gap-3 max-w-[220px]">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gold-100 text-gold-700">
                        <x-icon name="shield-check" class="h-6 w-6" />
                    </div>
                    <div>
                        <p class="text-sm font-bold text-ink-900">{{ $settings->hero_floating_title }}</p>
                        <p class="text-xs text-ink-800/60">{{ $settings->hero_floating_desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
