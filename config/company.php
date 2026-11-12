<?php

return [
    'name' => 'Gending Golden Park',
    'tagline' => 'Hunian Asri, Investasi Berharga',

    // Ganti dengan nomor WhatsApp asli (format 62xxxxxxxxxx, tanpa tanda + atau spasi)
    'whatsapp' => env('COMPANY_WHATSAPP', '62895630703554'),
    'phone_display' => env('COMPANY_PHONE_DISPLAY', '0895-6307-03554'),
    'email' => env('COMPANY_EMAIL', 'info@gendinggoldenpark.id'),

    'address' => env('COMPANY_ADDRESS', 'Perumahan Gending Golden Park, Desa Pikatan, Kec. Gending, Kab. Probolinggo, Jawa Timur 67272'),

    // Ganti dengan embed src Google Maps lokasi asli
    'maps_embed_src' => env(
        'COMPANY_MAPS_EMBED',
        'https://www.google.com/maps?q=-7.7937642,113.3191946&z=17&output=embed'
    ),

    'social' => [
        'instagram' => env('COMPANY_INSTAGRAM', 'https://instagram.com/gendinggoldenpark'),
        'facebook' => env('COMPANY_FACEBOOK', 'https://facebook.com/gendinggoldenpark'),
        'tiktok' => env('COMPANY_TIKTOK', 'https://tiktok.com/@gendinggoldenpark'),
    ],
];
