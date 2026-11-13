<?php

namespace App\Filament\Resources\GalleryItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Html;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class GalleryItemForm
{
    public const SIZES = [
        '' => ['label' => 'Normal', 'desc' => 'Kotak kecil (1 × 1)', 'cols' => 1, 'rows' => 1],
        'sm:col-span-2' => ['label' => 'Lebar', 'desc' => 'Memanjang ke samping (2 × 1)', 'cols' => 2, 'rows' => 1],
        'sm:col-span-2 sm:row-span-2' => ['label' => 'Besar', 'desc' => 'Kotak besar (2 × 2)', 'cols' => 2, 'rows' => 2],
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->label('Label')
                    ->required(),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('gallery')
                    ->required(),
                Radio::make('span')
                    ->label('Ukuran Tile')
                    ->options(array_map(fn (array $s): string => $s['label'], self::SIZES))
                    ->descriptions(array_map(fn (array $s): string => $s['desc'], self::SIZES))
                    ->default('')
                    ->live()
                    ->required(),
                Html::make(fn (Get $get): HtmlString => self::preview((string) $get('span'))),
            ]);
    }

    /**
     * Mini galeri 4 kolom yang menandai posisi/ukuran tile terpilih.
     */
    public static function preview(string $span): HtmlString
    {
        $size = self::SIZES[$span] ?? self::SIZES[''];
        $cells = '';

        for ($i = 0; $i < 12; $i++) {
            $cells .= '<div style="background:#f3f4f6;border-radius:6px"></div>';
        }

        $tile = sprintf(
            '<div style="grid-column:1 / span %d;grid-row:1 / span %d;background:#f2a90f;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#fff;font:700 12px sans-serif;box-shadow:0 2px 8px rgba(217,119,6,.4);z-index:1">%s</div>',
            $size['cols'],
            $size['rows'],
            e($size['label'])
        );

        return new HtmlString(
            '<div style="font:600 13px sans-serif;margin-bottom:8px">Pratinjau di galeri</div>'
            .'<div style="display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:44px;gap:6px;max-width:320px;position:relative">'
            .$cells.$tile.'</div>'
        );
    }
}
