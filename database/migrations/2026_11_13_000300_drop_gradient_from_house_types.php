<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('house_types', function (Blueprint $table) {
            $table->dropColumn('gradient_classes');
        });
    }

    public function down(): void
    {
        Schema::table('house_types', function (Blueprint $table) {
            $table->string('gradient_classes')->default('from-amber-300 to-amber-500');
        });
    }
};
