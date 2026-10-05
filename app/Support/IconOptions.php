<?php

namespace App\Support;

class IconOptions
{
    /**
     * Mirrors the @switch cases in resources/views/components/icon.blade.php.
     */
    public static function all(): array
    {
        $names = [
            'shield-check', 'shield', 'sparkles', 'mosque', 'swim', 'run', 'kids',
            'road', 'water', 'location', 'design', 'facility', 'check', 'chevron-down',
            'menu', 'close', 'star', 'arrow-right', 'whatsapp', 'phone', 'mail',
            'clock', 'instagram', 'facebook', 'tiktok', 'quote',
        ];

        return array_combine($names, $names);
    }
}
