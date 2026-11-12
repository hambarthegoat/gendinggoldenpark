<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('site_settings')
            ->where('address', 'Jl. Raya Gending No. 88, Probolinggo, Jawa Timur')
            ->update(['address' => config('company.address')]);

        DB::table('site_settings')
            ->where('maps_embed_src', 'https://www.google.com/maps?q=Probolinggo,Jawa+Timur&output=embed')
            ->update(['maps_embed_src' => config('company.maps_embed_src')]);
    }

    public function down(): void
    {
        //
    }
};
