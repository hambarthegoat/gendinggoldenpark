@props(['name'])

<svg {{ $attributes->merge(['class' => 'h-6 w-6', 'viewBox' => '0 0 24 24', 'fill' => 'none']) }}
    xmlns="http://www.w3.org/2000/svg">
    @switch($name)
        @case('shield-check')
            <path d="M12 3l7 3v5c0 5-3.3 8.4-7 10-3.7-1.6-7-5-7-10V6l7-3z" stroke="currentColor" stroke-width="1.7"
                stroke-linejoin="round" />
            <path d="M9 12.2l2 2 4-4.4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                stroke-linejoin="round" />
        @break

        @case('shield')
            <path d="M12 3l7 3v5c0 5-3.3 8.4-7 10-3.7-1.6-7-5-7-10V6l7-3z" stroke="currentColor" stroke-width="1.7"
                stroke-linejoin="round" />
        @break

        @case('sparkles')
            <path d="M11 3l1.2 3.5L16 8l-3.8 1.5L11 13l-1.2-3.5L6 8l3.8-1.5L11 3z" fill="currentColor" />
            <path d="M18 13l.7 2 2 .7-2 .7-.7 2-.7-2-2-.7 2-.7.7-2z" fill="currentColor" />
        @break

        @case('mosque')
            <path d="M12 3v2.2M12 5.2a2 2 0 1 1 0 4 2 2 0 0 1 0-4z" stroke="currentColor" stroke-width="1.6"
                stroke-linecap="round" />
            <path d="M6 21v-6.5c0-2.6 2.7-4.7 6-4.7s6 2.1 6 4.7V21" stroke="currentColor" stroke-width="1.7"
                stroke-linejoin="round" />
            <path d="M3 21h18M4.5 21v-3.2c0-1 .7-1.8 1.5-1.8s1.5.8 1.5 1.8V21M16.5 21v-3.2c0-1 .7-1.8 1.5-1.8s1.5.8 1.5 1.8V21"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M10.3 21v-3.6a1.7 1.7 0 0 1 3.4 0V21" stroke="currentColor" stroke-width="1.5" />
        @break

        @case('swim')
            <circle cx="6.5" cy="6" r="1.6" fill="currentColor" />
            <path d="M9 10.5l3.5-2.3a1.6 1.6 0 0 1 2 .2l1.7 1.7 3.3-1.4" stroke="currentColor" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3 15.5c1.3 1.2 2.6 1.2 3.9 0 1.3-1.2 2.6-1.2 3.9 0 1.3 1.2 2.6 1.2 3.9 0 1.3-1.2 2.6-1.2 3.9 0"
                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
            <path d="M3 19.5c1.3 1.2 2.6 1.2 3.9 0 1.3-1.2 2.6-1.2 3.9 0 1.3 1.2 2.6 1.2 3.9 0 1.3-1.2 2.6-1.2 3.9 0"
                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
        @break

        @case('run')
            <circle cx="14.5" cy="4.5" r="1.6" fill="currentColor" />
            <path d="M9 20l2.4-4 2-1.6-1-3.4-3 2.2M11.4 14.4 14 12l1.2 2.4 3.3 1M9.4 10.8 12 9.2l2.5.9"
                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
        @break

        @case('kids')
            <circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.6" />
            <path d="M9 11v6M6 21l3-4 3 4M4 16.5A5 5 0 0 1 9 12" stroke="currentColor" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15 9l3 3-3 3M18 12h-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                stroke-linejoin="round" />
        @break

        @case('road')
            <path d="M9 3 5 21M15 3l4 18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
            <path d="M12 3v2.5M12 8.5v2.5M12 13.5V16M12 19v2" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" />
        @break

        @case('water')
            <path d="M12 3c3 4 6 7.6 6 11a6 6 0 1 1-12 0c0-3.4 3-7 6-11z" stroke="currentColor" stroke-width="1.7"
                stroke-linejoin="round" />
        @break

        @case('location')
            <path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z" stroke="currentColor"
                stroke-width="1.7" stroke-linejoin="round" />
            <circle cx="12" cy="9.5" r="2.4" stroke="currentColor" stroke-width="1.6" />
        @break

        @case('design')
            <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.6" />
            <circle cx="9" cy="10" r="1.3" fill="currentColor" />
            <circle cx="14" cy="9" r="1.1" fill="currentColor" />
            <circle cx="15.5" cy="13.5" r="1.2" fill="currentColor" />
            <circle cx="10" cy="15" r="1.1" fill="currentColor" />
        @break

        @case('facility')
            <path d="M4 21V6l8-3 8 3v15" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
            <path d="M9 21v-5h6v5M8 9h1.5M14.5 9H16M8 13h1.5M14.5 13H16" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" />
        @break

        @case('check')
            <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        @break

        @case('chevron-down')
            <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                stroke-linejoin="round" />
        @break

        @case('menu')
            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
        @break

        @case('close')
            <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
        @break

        @case('star')
            <path
                d="M12 2.5l2.95 5.98 6.6.96-4.78 4.66 1.13 6.58L12 17.6l-5.9 3.1 1.13-6.58L2.45 9.44l6.6-.96L12 2.5z"
                fill="currentColor" />
        @break

        @case('arrow-right')
            <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                stroke-linejoin="round" />
        @break

        @case('whatsapp')
            <path
                d="M12 3.5a8.5 8.5 0 0 0-7.3 12.8L3.5 20.5l4.3-1.1A8.5 8.5 0 1 0 12 3.5z"
                stroke="currentColor" stroke-width="1.5" />
            <path
                d="M9 8.7c.2-.5.5-.5.8-.5h.6c.2 0 .4 0 .6.4.2.5.7 1.6.7 1.7.1.1.1.3 0 .4-.1.2-.2.3-.3.4l-.4.5c-.1.2-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.4 2.4 1.5.3.1.4.1.6-.1l.6-.7c.2-.3.4-.2.6-.1l1.5.7c.2.1.4.2.4.3.1.2.1 1-.3 1.4-.4.4-1.2.9-2.1.8-.9-.1-3-.9-4.6-2.6-1.6-1.7-2.4-3.6-2.5-4-.1-.4-.5-1.5.2-2.5z"
                fill="currentColor" />
        @break

        @case('phone')
            <rect x="7" y="2.5" width="10" height="19" rx="2.2" stroke="currentColor" stroke-width="1.6" />
            <path d="M10.5 18.5h3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
        @break

        @case('mail')
            <rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.6" />
            <path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                stroke-linejoin="round" />
        @break

        @case('clock')
            <circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.6" />
            <path d="M12 7.5V12l3 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                stroke-linejoin="round" />
        @break

        @case('instagram')
            <rect x="3.5" y="3.5" width="17" height="17" rx="5" stroke="currentColor" stroke-width="1.6" />
            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6" />
            <circle cx="16.8" cy="7.2" r="1" fill="currentColor" />
        @break

        @case('facebook')
            <rect x="3.5" y="3.5" width="17" height="17" rx="5" stroke="currentColor" stroke-width="1.6" />
            <path d="M13.5 20v-6h2l.4-2.4h-2.4v-1.6c0-.7.2-1.2 1.2-1.2h1.3V6.6c-.2 0-1-.1-1.9-.1-1.9 0-3.2 1.1-3.2 3.2v1.9H9v2.4h1.9V20"
                fill="currentColor" />
        @break

        @case('tiktok')
            <rect x="3.5" y="3.5" width="17" height="17" rx="5" stroke="currentColor" stroke-width="1.6" />
            <path d="M13 7v6.7a1.9 1.9 0 1 1-1.4-1.8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
            <path d="M13 7c.2 1.4 1.2 2.4 2.6 2.6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        @break

        @case('quote')
            <path d="M9.5 8.5c-2.5 0-4 1.8-4 4.2 0 2 1.3 3.3 3 3.3 1.5 0 2.5-1 2.5-2.4 0-1.2-.8-2.1-2-2.2.2-1.3 1.3-2.3 2.8-2.5l-.2-.4z"
                fill="currentColor" />
            <path d="M17 8.5c-2.5 0-4 1.8-4 4.2 0 2 1.3 3.3 3 3.3 1.5 0 2.5-1 2.5-2.4 0-1.2-.8-2.1-2-2.2.2-1.3 1.3-2.3 2.8-2.5l-.2-.4z"
                fill="currentColor" />
        @break
    @endswitch
</svg>
