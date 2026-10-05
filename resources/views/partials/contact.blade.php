<section id="kontak" class="relative scroll-mt-20 overflow-hidden bg-ink-900 py-20 md:py-28">
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-gold-600/25 blur-3xl"></div>
        <div class="absolute -top-24 right-0 h-80 w-80 rounded-full bg-gold-500/20 blur-3xl"></div>
        <div class="absolute inset-0 bg-noise opacity-20"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-5 md:px-8">
        <div class="grid gap-12 lg:grid-cols-2">
            <div class="flex flex-col justify-center">
                <span class="text-sm font-bold uppercase tracking-widest text-gold-400">Hubungi Kami</span>
                <h2 class="mt-3 font-display text-3xl font-extrabold text-white sm:text-4xl">
                    Wujudkan Rumah Impian Anda, Mulai Sekarang
                </h2>
                <p class="mt-4 max-w-md text-gold-100/70">
                    Tim marketing kami siap membantu menjawab pertanyaan, menjadwalkan survei lokasi, hingga proses
                    KPR Anda.
                </p>

                <div class="mt-8 space-y-4">
                    <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" rel="noopener"
                        class="flex items-center gap-4 rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm transition-colors hover:bg-white/10">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gold-500/20 text-gold-300">
                            <x-icon name="whatsapp" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-xs text-gold-100/55">WhatsApp</p>
                            <p class="text-sm font-bold text-white">{{ $settings->phone_display }}</p>
                        </div>
                    </a>
                    <div class="flex items-center gap-4 rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gold-500/20 text-gold-300">
                            <x-icon name="mail" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-xs text-gold-100/55">Email</p>
                            <p class="text-sm font-bold text-white">{{ $settings->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gold-500/20 text-gold-300">
                            <x-icon name="location" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-xs text-gold-100/55">Kantor Pemasaran</p>
                            <p class="text-sm font-bold text-white">{{ $settings->address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl bg-white p-7 shadow-2xl sm:p-9">
                @if (session('lead_success'))
                    <div class="mb-6 flex items-center gap-3 rounded-2xl bg-green-50 p-4 text-sm font-semibold text-green-700 ring-1 ring-green-200">
                        <x-icon name="check" class="h-5 w-5 shrink-0" />
                        {{ session('lead_success') }}
                    </div>
                @endif

                <h3 class="font-display text-xl font-bold text-ink-900">Minta Info & Penawaran</h3>
                <p class="mt-1 text-sm text-ink-800/60">Isi form berikut, tim kami akan segera menghubungi Anda.</p>

                <form method="POST" action="{{ route('leads.store') }}" class="mt-6 space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="mb-1.5 block text-sm font-semibold text-ink-800">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="w-full rounded-xl border border-gold-200 bg-gold-50/50 px-4 py-3 text-sm text-ink-900 placeholder:text-ink-800/40 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-gold-500/30"
                            placeholder="Nama Anda">
                        @error('name')
                            <p class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="phone" class="mb-1.5 block text-sm font-semibold text-ink-800">No. WhatsApp</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                                class="w-full rounded-xl border border-gold-200 bg-gold-50/50 px-4 py-3 text-sm text-ink-900 placeholder:text-ink-800/40 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-gold-500/30"
                                placeholder="08xxxxxxxxxx">
                            @error('phone')
                                <p class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-semibold text-ink-800">Email
                                <span class="font-normal text-ink-800/40">(opsional)</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full rounded-xl border border-gold-200 bg-gold-50/50 px-4 py-3 text-sm text-ink-900 placeholder:text-ink-800/40 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-gold-500/30"
                                placeholder="nama@email.com">
                            @error('email')
                                <p class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="house_type" class="mb-1.5 block text-sm font-semibold text-ink-800">Tipe yang
                            Diminati</label>
                        <select id="house_type" name="house_type"
                            class="w-full rounded-xl border border-gold-200 bg-gold-50/50 px-4 py-3 text-sm text-ink-900 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-gold-500/30">
                            <option value="">Pilih tipe rumah</option>
                            @foreach ($houseTypes as $house)
                                <option value="{{ $house['name'] }}" @selected(old('house_type') === $house['name'])>
                                    {{ $house['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="message" class="mb-1.5 block text-sm font-semibold text-ink-800">Pesan
                            <span class="font-normal text-ink-800/40">(opsional)</span></label>
                        <textarea id="message" name="message" rows="3"
                            class="w-full rounded-xl border border-gold-200 bg-gold-50/50 px-4 py-3 text-sm text-ink-900 placeholder:text-ink-800/40 focus:border-gold-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-gold-500/30"
                            placeholder="Tuliskan pertanyaan Anda...">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-gold-500 to-gold-700 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-gold-500/30 transition-transform hover:-translate-y-0.5">
                        Kirim Permintaan
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
