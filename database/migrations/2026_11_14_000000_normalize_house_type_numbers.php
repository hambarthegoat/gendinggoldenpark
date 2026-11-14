<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Harga dan luas disimpan sebagai angka polos; pemformatan (Rp, titik, m²) dilakukan saat tampil.
 */
return new class extends Migration
{
    public function up(): void
    {
        foreach (DB::table('house_types')->get() as $row) {
            DB::table('house_types')->where('id', $row->id)->update([
                'price' => $this->price((string) $row->price),
                'land' => $this->area((string) $row->land),
                'building' => $this->area((string) $row->building),
            ]);
        }
    }

    public function down(): void
    {
        //
    }

    private function price(string $value): string
    {
        if (preg_match('/([\d.,]+)\s*juta/i', $value, $m)) {
            return (string) (int) round((float) str_replace(',', '.', $m[1]) * 1_000_000);
        }

        $digits = preg_replace('/\D+/', '', $value);

        return $digits === '' ? $value : $digits;
    }

    private function area(string $value): string
    {
        return preg_match('/\d+(?:[.,]\d+)?/', $value, $m) ? str_replace(',', '.', $m[0]) : $value;
    }
};
