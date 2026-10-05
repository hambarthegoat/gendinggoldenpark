<section id="galeri" class="relative scroll-mt-20 bg-gold-50 py-20 md:py-28">
    <div class="mx-auto max-w-7xl px-5 md:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-sm font-bold uppercase tracking-widest text-gold-600">Dokumentasi</span>
            <h2 class="mt-3 font-display text-3xl font-extrabold text-ink-900 sm:text-4xl">Galeri Kawasan</h2>
            <p class="mt-4 text-ink-800/70">Intip suasana lingkungan Gending Golden Park yang asri dan tertata rapi.
            </p>
        </div>

        <div class="mt-14 grid auto-rows-[180px] grid-cols-2 gap-4 sm:grid-cols-4">
            @foreach ($galleryItems as $item)
                <div
                    class="{{ $item['span'] }} group relative overflow-hidden rounded-2xl bg-gradient-to-br {{ $item['from_class'] }} {{ $item['to_class'] }} shadow-sm">
                    @if ($item->image)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}" class="absolute inset-0 h-full w-full object-cover" alt="{{ $item['label'] }}">
                    @endif
                    <div class="absolute inset-0 bg-noise opacity-20"></div>
                    <div
                        class="absolute inset-0 flex items-end bg-gradient-to-t from-black/50 via-black/0 to-transparent p-4 transition-opacity">
                        <span class="font-display text-sm font-bold text-white drop-shadow">{{ $item['label'] }}</span>
                    </div>
                    <div
                        class="absolute inset-0 scale-105 bg-black/0 transition-all duration-300 group-hover:scale-100 group-hover:bg-black/10">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
