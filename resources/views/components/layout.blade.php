@props(['settings'])
<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gending Golden Park</title>
    <meta name="description"
        content="{{ $settings->company_name }}, perumahan modern dengan lingkungan asri, keamanan 24 jam, dan lokasi strategis. Wujudkan rumah impian Anda sekarang.">
    <meta name="theme-color" content="#f2a90f">
    <meta name="color-scheme" content="light">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-ink-900 antialiased selection:bg-gold-300 selection:text-ink-900">
    {{ $slot }}
</body>

</html>
