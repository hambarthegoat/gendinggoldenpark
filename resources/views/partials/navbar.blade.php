<header
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 12)"
    class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
    :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-[0_2px_20px_-4px_rgba(180,83,9,0.2)]' : 'bg-transparent'"
>
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3 md:px-8">
        <x-logo reactive />

        <div class="hidden items-center gap-8 lg:flex">
            <a href="#tentang" class="text-sm font-semibold transition-colors hover:text-gold-700" :class="scrolled ? 'text-ink-800' : 'text-white'">Tentang</a>
            <a href="#tipe-rumah" class="text-sm font-semibold transition-colors hover:text-gold-700" :class="scrolled ? 'text-ink-800' : 'text-white'">Tipe Rumah</a>
            <a href="#fasilitas" class="text-sm font-semibold transition-colors hover:text-gold-700" :class="scrolled ? 'text-ink-800' : 'text-white'">Fasilitas</a>
            <a href="#galeri" class="text-sm font-semibold transition-colors hover:text-gold-700" :class="scrolled ? 'text-ink-800' : 'text-white'">Galeri</a>
            <a href="#lokasi" class="text-sm font-semibold transition-colors hover:text-gold-700" :class="scrolled ? 'text-ink-800' : 'text-white'">Lokasi</a>
            <a href="#faq" class="text-sm font-semibold transition-colors hover:text-gold-700" :class="scrolled ? 'text-ink-800' : 'text-white'">FAQ</a>
        </div>

        <div class="hidden lg:flex items-center gap-3">
            <a href="#kontak"
                class="rounded-full border-2 border-gold-500 px-5 py-2 text-sm font-bold text-gold-700 hover:bg-gold-500 hover:text-white transition-colors">
                Kontak
            </a>
            <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode('Halo, saya tertarik dengan '.$settings->company_name) }}"
                target="_blank" rel="noopener"
                class="flex items-center gap-2 rounded-full bg-gradient-to-r from-gold-500 to-gold-700 px-5 py-2 text-sm font-bold text-white shadow-lg shadow-gold-600/30 hover:shadow-gold-600/50 hover:-translate-y-0.5 transition-all">
                <x-icon name="whatsapp" class="h-4 w-4" />
                WhatsApp
            </a>
        </div>

        <button @click="open = !open" class="lg:hidden p-2" :class="scrolled ? 'text-ink-900' : 'text-white'" aria-label="Menu">
            <x-icon x-show="!open" name="menu" class="h-6 w-6" />
            <x-icon x-show="open" x-cloak name="close" class="h-6 w-6" />
            </button>
    </nav>

    <div x-show="open" x-cloak x-transition
        @click.outside="open = false"
        class="lg:hidden mx-4 mb-3 rounded-2xl bg-white shadow-xl ring-1 ring-gold-200 overflow-hidden">
        <div class="flex flex-col divide-y divide-gold-100">
            <a @click="open=false" href="#tentang" class="px-6 py-3.5 font-semibold text-ink-800">Tentang</a>
            <a @click="open=false" href="#tipe-rumah" class="px-6 py-3.5 font-semibold text-ink-800">Tipe Rumah</a>
            <a @click="open=false" href="#fasilitas" class="px-6 py-3.5 font-semibold text-ink-800">Fasilitas</a>
            <a @click="open=false" href="#galeri" class="px-6 py-3.5 font-semibold text-ink-800">Galeri</a>
            <a @click="open=false" href="#lokasi" class="px-6 py-3.5 font-semibold text-ink-800">Lokasi</a>
            <a @click="open=false" href="#faq" class="px-6 py-3.5 font-semibold text-ink-800">FAQ</a>
            <a @click="open=false" href="#kontak" class="px-6 py-3.5 font-bold text-gold-700">Kontak</a>
        </div>
    </div>
</header>
