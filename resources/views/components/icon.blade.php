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
            <path d="M12 2.5v2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7 12a5 5 0 0 1 10 0" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M5 21V12h14v9" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10 21v-3.5a2 2 0 0 1 4 0V21" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3 21h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 4.5c-1.8 1.3-2.8 2.8-3 4.5h6c-.2-1.7-1.2-3.2-3-4.5z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
        @break

        @case('swim')
            <path d="M2 7c.6.5 1.2 1 2.5 1C7 8 7 6 9.5 6c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M2 13c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M2 19c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
        @break

        @case('run')
            <rect x="3" y="6.5" width="18" height="11" rx="5.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <rect x="7.5" y="10" width="9" height="4" rx="2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
        @break

        @case('kids')
            <path d="M4 4h16" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 4l-2 17M18 4l2 17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M9.5 4v11M14.5 4v11" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.5 15h4M12.5 15h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
        @break

        @case('road')
            <path d="M8.5 3 4 21M15.5 3 20 21" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 3v3M12 10v4M12 18v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
        @break

        @case('tree')
            <path d="M8 19a4 4 0 0 1-2.24-7.32A3.5 3.5 0 0 1 9 6.03V6a3 3 0 1 1 6 0v.04a3.5 3.5 0 0 1 3.24 5.65A4 4 0 0 1 16 19Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 19v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
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
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" fill="currentColor" />
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
