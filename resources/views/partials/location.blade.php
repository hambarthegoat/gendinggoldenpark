<section id="lokasi" class="relative scroll-mt-20 bg-white py-20 md:py-28">
    <div class="mx-auto max-w-7xl px-5 md:px-8">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
            <div>
                <span class="text-sm font-bold uppercase tracking-widest text-gold-600">Lokasi Strategis</span>
                <h2 class="mt-3 font-display text-3xl font-extrabold text-ink-900 sm:text-4xl">
                    Akses Mudah ke Mana Saja
                </h2>
                <p class="mt-4 text-ink-800/70">
                    Berlokasi di titik strategis dengan akses cepat ke berbagai fasilitas umum, menjadikan aktivitas
                    harian keluarga Anda lebih efisien.
                </p>

                <div class="mt-6 flex items-start gap-3 rounded-2xl bg-gold-50 p-4 ring-1 ring-gold-200">
                    <x-icon name="location" class="h-6 w-6 shrink-0 text-gold-600" />
                    <p class="text-sm font-semibold text-ink-800">{{ $settings->address }}</p>
                </div>

                <ul class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    @foreach ($accessPoints as $point)
                        <li class="flex items-center gap-2.5 text-sm text-ink-800">
                            <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-gold-500 text-white">
                                <x-icon name="check" class="h-3.5 w-3.5" />
                            </span>
                            {{ $point->text }}
                        </li>
                    @endforeach
                </ul>

                <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode('Halo, saya ingin survei lokasi '.$settings->company_name) }}"
                    target="_blank" rel="noopener"
                    class="mt-8 inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-gold-500 to-gold-700 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-gold-500/30 hover:-translate-y-0.5 transition-transform">
                    Jadwalkan Survei Lokasi
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            <div class="overflow-hidden rounded-3xl shadow-xl ring-1 ring-gold-200">
                <iframe
                    src="{{ $settings->maps_embed_src }}"
                    class="h-[420px] w-full grayscale-[15%]"
                    style="border:0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Peta Lokasi {{ $settings->company_name }}">
                </iframe>
            </div>
        </div>
    </div>
</section>
