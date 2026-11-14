<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    protected $fillable = [
        'name', 'price', 'land', 'building',
        'bedrooms', 'bathrooms', 'carport',
        'image', 'featured', 'sort_order',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    /**
     * Harga tersimpan sebagai angka polos (mis. 1000000), tampil sebagai "Rp1.000.000".
     */
    protected function priceFormatted(): Attribute
    {
        return Attribute::get(fn (): string => self::formatRupiah($this->price));
    }

    protected function landFormatted(): Attribute
    {
        return Attribute::get(fn (): string => self::formatArea($this->land));
    }

    protected function buildingFormatted(): Attribute
    {
        return Attribute::get(fn (): string => self::formatArea($this->building));
    }

    public static function formatRupiah(?string $value): string
    {
        $digits = preg_replace('/\D+/', '', (string) $value);

        return $digits === '' ? (string) $value : 'Rp'.number_format((int) $digits, 0, ',', '.');
    }

    public static function formatArea(?string $value): string
    {
        $clean = trim((string) $value);

        if (! is_numeric($clean)) {
            return $clean;
        }

        $number = rtrim(rtrim(number_format((float) $clean, 2, ',', '.'), '0'), ',');

        return $number.' m²';
    }
}
