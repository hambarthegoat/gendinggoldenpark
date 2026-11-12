<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('site_settings')
            ->where('whatsapp', '6281234567890')
            ->update(['whatsapp' => '62895630703554']);

        DB::table('site_settings')
            ->where('phone_display', '0812-3456-7890')
            ->update(['phone_display' => '0895-6307-03554']);
    }

    public function down(): void
    {
        //
    }
};
