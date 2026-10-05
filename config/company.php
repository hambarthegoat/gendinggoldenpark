<?php

return [
    'name' => 'Gending Golden Park',
    'tagline' => 'Hunian Asri, Investasi Berharga',

    // Ganti dengan nomor WhatsApp asli (format 62xxxxxxxxxx, tanpa tanda + atau spasi)
    'whatsapp' => env('COMPANY_WHATSAPP', '6281234567890'),
    'phone_display' => env('COMPANY_PHONE_DISPLAY', '0812-3456-7890'),
    'email' => env('COMPANY_EMAIL', 'info@gendinggoldenpark.id'),

    'address' => env('COMPANY_ADDRESS', 'Jl. Raya Gending No. 88, Probolinggo, Jawa Timur'),

    // Ganti dengan embed src Google Maps lokasi asli
    'maps_embed_src' => env(
        'COMPANY_MAPS_EMBED',
        'https://www.google.com/maps?q=Probolinggo,Jawa+Timur&output=embed'
    ),

    'social' => [
        'instagram' => env('COMPANY_INSTAGRAM', 'https://instagram.com/gendinggoldenpark'),
        'facebook' => env('COMPANY_FACEBOOK', 'https://facebook.com/gendinggoldenpark'),
        'tiktok' => env('COMPANY_TIKTOK', 'https://tiktok.com/@gendinggoldenpark'),
    ],
];
