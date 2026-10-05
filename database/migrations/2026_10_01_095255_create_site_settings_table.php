<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            $table->string('hero_badge');
            $table->string('hero_headline_prefix');
            $table->string('hero_headline_highlight');
            $table->text('hero_subtext');
            $table->string('hero_cta_primary_label');
            $table->string('hero_cta_secondary_label');
            $table->string('hero_floating_title');
            $table->string('hero_floating_desc');

            $table->string('company_name');
            $table->string('company_tagline');
            $table->string('whatsapp');
            $table->string('phone_display');
            $table->string('email');
            $table->text('address');
            $table->text('maps_embed_src');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('tiktok');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
