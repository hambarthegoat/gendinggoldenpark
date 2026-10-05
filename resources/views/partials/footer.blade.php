<footer class="bg-ink-900 pt-16 pb-8">
    <div class="mx-auto max-w-7xl px-5 md:px-8">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <x-logo dark />
                <p class="mt-4 max-w-xs text-sm leading-relaxed text-gold-100/60">
                    {{ $settings->company_tagline }}. Hunian modern dengan lingkungan asri untuk keluarga Indonesia.
                </p>
                <div class="mt-5 flex items-center gap-3">
                    <a href="{{ $settings->instagram }}" target="_blank" rel="noopener"
                        class="flex h-9 w-9 items-center justify-center rounded-full bg-white/5 text-gold-300 ring-1 ring-white/10 hover:bg-gold-500 hover:text-white transition-colors">
                        <x-icon name="instagram" class="h-4 w-4" />
                    </a>
                    <a href="{{ $settings->facebook }}" target="_blank" rel="noopener"
                        class="flex h-9 w-9 items-center justify-center rounded-full bg-white/5 text-gold-300 ring-1 ring-white/10 hover:bg-gold-500 hover:text-white transition-colors">
                        <x-icon name="facebook" class="h-4 w-4" />
                    </a>
                    <a href="{{ $settings->tiktok }}" target="_blank" rel="noopener"
                        class="flex h-9 w-9 items-center justify-center rounded-full bg-white/5 text-gold-300 ring-1 ring-white/10 hover:bg-gold-500 hover:text-white transition-colors">
                        <x-icon name="tiktok" class="h-4 w-4" />
                    </a>
                </div>
            </div>

            <div>
                <h4 class="font-display text-sm font-bold uppercase tracking-wider text-gold-400">Navigasi</h4>
                <ul class="mt-4 space-y-2.5 text-sm text-gold-100/60">
                    <li><a href="#tentang" class="hover:text-gold-300 transition-colors">Tentang Kami</a></li>
                    <li><a href="#tipe-rumah" class="hover:text-gold-300 transition-colors">Tipe Rumah</a></li>
                    <li><a href="#fasilitas" class="hover:text-gold-300 transition-colors">Fasilitas</a></li>
                    <li><a href="#galeri" class="hover:text-gold-300 transition-colors">Galeri</a></li>
                    <li><a href="#lokasi" class="hover:text-gold-300 transition-colors">Lokasi</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display text-sm font-bold uppercase tracking-wider text-gold-400">Bantuan</h4>
                <ul class="mt-4 space-y-2.5 text-sm text-gold-100/60">
                    <li><a href="#faq" class="hover:text-gold-300 transition-colors">FAQ</a></li>
                    <li><a href="#kontak" class="hover:text-gold-300 transition-colors">Kontak</a></li>
                    <li>
                        <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" rel="noopener"
                            class="hover:text-gold-300 transition-colors">Konsultasi via WhatsApp</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="font-display text-sm font-bold uppercase tracking-wider text-gold-400">Kontak</h4>
                <ul class="mt-4 space-y-3 text-sm text-gold-100/60">
                    <li class="flex items-start gap-2.5">
                        <x-icon name="location" class="h-4 w-4 shrink-0 mt-0.5 text-gold-400" />
                        {{ $settings->address }}
                    </li>
                    <li class="flex items-center gap-2.5">
                        <x-icon name="phone" class="h-4 w-4 shrink-0 text-gold-400" />
                        {{ $settings->phone_display }}
                    </li>
                    <li class="flex items-center gap-2.5">
                        <x-icon name="mail" class="h-4 w-4 shrink-0 text-gold-400" />
                        {{ $settings->email }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-14 flex flex-col items-center justify-between gap-4 border-t border-white/10 pt-6 sm:flex-row">
            <p class="text-xs text-gold-100/40">
                &copy; {{ date('Y') }} {{ $settings->company_name }}. Seluruh hak cipta dilindungi.
            </p>
            <p class="text-xs text-gold-100/40">Dibangun dengan Laravel</p>
        </div>
    </div>
</footer>

<a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode('Halo, saya ingin bertanya tentang '.$settings->company_name) }}"
    target="_blank" rel="noopener"
    class="fixed bottom-5 right-5 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-green-500 text-white shadow-xl shadow-green-600/40 transition-transform hover:scale-110 sm:h-16 sm:w-16"
    aria-label="Chat WhatsApp">
    <x-icon name="whatsapp" class="h-7 w-7" />
</a>
