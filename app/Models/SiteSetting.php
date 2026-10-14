<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'hero_badge', 'hero_headline_prefix', 'hero_headline_highlight', 'hero_subtext',
        'hero_cta_primary_label', 'hero_cta_secondary_label',
        'hero_floating_title', 'hero_floating_desc', 'hero_image',
        'company_name', 'company_tagline', 'whatsapp', 'phone_display', 'email',
        'address', 'maps_embed_src', 'instagram', 'facebook', 'tiktok',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'hero_badge' => '',
            'hero_headline_prefix' => '',
            'hero_headline_highlight' => '',
            'hero_subtext' => '',
            'hero_cta_primary_label' => '',
            'hero_cta_secondary_label' => '',
            'hero_floating_title' => '',
            'hero_floating_desc' => '',
            'company_name' => '',
            'company_tagline' => '',
            'whatsapp' => '',
            'phone_display' => '',
            'email' => '',
            'address' => '',
            'maps_embed_src' => '',
            'instagram' => '',
            'facebook' => '',
            'tiktok' => '',
        ]);
    }
}
