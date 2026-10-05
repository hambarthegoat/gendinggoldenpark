<section id="tipe-rumah" class="relative scroll-mt-20 bg-white py-20 md:py-28">
    <div class="mx-auto max-w-7xl px-5 md:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-gold-600">Pilihan Hunian</span>
            <h2 class="mt-3 font-display text-3xl font-extrabold text-ink-900 sm:text-4xl">Tipe Rumah</h2>
            <p class="mt-4 text-ink-800/70">Beragam pilihan tipe rumah yang bisa disesuaikan dengan kebutuhan dan
                budget keluarga Anda.</p>
        </div>

        <div class="mt-14 grid gap-8 lg:grid-cols-3">
            @foreach ($houseTypes as $house)
                <div
                    class="group relative flex flex-col overflow-hidden rounded-3xl border {{ $house['featured'] ? 'border-gold-400 shadow-xl shadow-gold-300/40' : 'border-gold-200/70 shadow-sm' }} bg-white transition-all hover:-translate-y-1.5 hover:shadow-xl lg:{{ $house['featured'] ? 'scale-[1.02] z-10' : 'scale-100' }}">

                    @if ($house['featured'])
                        <span
                            class="absolute right-5 top-5 z-10 rounded-full bg-ink-900 px-3 py-1 text-xs font-bold text-gold-300">
                            Paling Diminati
                        </span>
                    @endif

                    <div class="relative aspect-[4/3] w-full overflow-hidden bg-gradient-to-br {{ $house['gradient_classes'] }}">
                        @if ($house->image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($house->image) }}" class="absolute inset-0 h-full w-full object-cover" alt="{{ $house['name'] }}">
                        @else
                            <div class="absolute inset-0 bg-noise opacity-20"></div>
                            <svg viewBox="0 0 400 300" class="absolute inset-0 h-full w-full"
                                preserveAspectRatio="xMidYMax slice">
                                <path d="M60 210 L200 130 L340 210 L340 260 L60 260 Z" fill="#201a10" fill-opacity="0.35" />
                                <path d="M200 130 L340 210 L200 210 Z" fill="#201a10" fill-opacity="0.15" />
                                <rect x="120" y="215" width="34" height="45" fill="#fffbea" fill-opacity="0.55" rx="2" />
                                <rect x="170" y="215" width="34" height="45" fill="#fffbea" fill-opacity="0.55" rx="2" />
                                <rect x="230" y="215" width="34" height="45" fill="#fffbea" fill-opacity="0.55" rx="2" />
                            </svg>
                        @endif
                        <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/25 to-transparent"></div>
                    </div>

                    <div class="flex flex-1 flex-col p-7">
                        <h3 class="font-display text-xl font-extrabold text-ink-900">{{ $house['name'] }}</h3>
                        <p class="mt-1 text-lg font-bold text-gold-700">{{ $house['price'] }}</p>

                        <div class="mt-5 grid grid-cols-2 gap-y-3 text-sm text-ink-800/75">
                            <span>Luas Tanah</span>
                            <span class="text-right font-semibold text-ink-900">{{ $house['land'] }}</span>
                            <span>Luas Bangunan</span>
                            <span class="text-right font-semibold text-ink-900">{{ $house['building'] }}</span>
                            <span>Kamar Tidur</span>
                            <span class="text-right font-semibold text-ink-900">{{ $house['bedrooms'] }}</span>
                            <span>Kamar Mandi</span>
                            <span class="text-right font-semibold text-ink-900">{{ $house['bathrooms'] }}</span>
                            <span>Carport</span>
                            <span class="text-right font-semibold text-ink-900">{{ $house['carport'] }}</span>
                        </div>

                        <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode('Halo, saya tertarik dengan '.$house['name'].' di '.$settings->company_name) }}"
                            target="_blank" rel="noopener"
                            class="mt-7 inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-gold-500 to-gold-700 px-5 py-3 text-sm font-bold text-white shadow-md shadow-gold-500/30 transition-transform hover:-translate-y-0.5">
                            Tanya Ketersediaan
                            <x-icon name="arrow-right" class="h-4 w-4" />
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
