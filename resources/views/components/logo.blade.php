@props(['dark' => false, 'iconOnly' => false, 'reactive' => false])

<a href="{{ route('home') }}" {{ $attributes->class(['flex items-center gap-2.5 shrink-0']) }}>
    <img src="{{ asset('images/logo.png') }}" alt="Logo {{ config('company.name') }}" width="40" height="40"
        class="h-9 w-9 md:h-10 md:w-10 shrink-0 rounded-xl object-cover shadow-md shadow-gold-600/30 ring-1 ring-gold-500/40">

    @unless($iconOnly)
        <span class="flex flex-col leading-[1.05]">
            <span
                class="font-display font-extrabold tracking-wide text-[15px] md:text-lg {{ $reactive ? '' : ($dark ? 'text-gold-50' : 'text-ink-900') }}"
                @if($reactive) :class="scrolled ? 'text-ink-900' : 'text-gold-50'" @endif
            >GENDING</span>
            <span
                class="font-display font-extrabold tracking-wide text-[15px] md:text-lg -mt-0.5 bg-gradient-to-r from-gold-500 via-gold-600 to-gold-700 bg-clip-text text-transparent">GOLDEN
                PARK</span>
        </span>
    @endunless
</a>
