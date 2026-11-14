<?php

namespace App\Filament\Resources\HouseTypes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

class HouseTypeForm
{
    public const NAME_CUSTOM = 'custom';

    public const NAME_OPTIONS = [
        'Blok A' => 'Blok A',
        'Blok B' => 'Blok B',
        self::NAME_CUSTOM => 'Isi sendiri',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('name_choice')
                    ->label('Nama')
                    ->options(self::NAME_OPTIONS)
                    ->default('Blok A')
                    ->live()
                    ->required(),
                TextInput::make('name_custom')
                    ->label('Nama (isi sendiri)')
                    ->placeholder('Contoh: Tipe 36/72')
                    ->visible(fn (Get $get): bool => $get('name_choice') === self::NAME_CUSTOM)
                    ->required(fn (Get $get): bool => $get('name_choice') === self::NAME_CUSTOM),
                TextInput::make('price')
                    ->label('Harga')
                    ->prefix('Rp')
                    ->mask(RawJs::make('$money($input, \',\', \'.\', 0)'))
                    ->stripCharacters('.')
                    ->numeric()
                    ->helperText('Cukup ketik angka, titik pemisah ribuan otomatis. Tampil di situs sebagai Rp1.000.000.')
                    ->required(),
                TextInput::make('land')
                    ->label('Luas Tanah')
                    ->numeric()
                    ->suffix('m²')
                    ->required(),
                TextInput::make('building')
                    ->label('Luas Bangunan')
                    ->numeric()
                    ->suffix('m²')
                    ->required(),
                TextInput::make('bedrooms')
                    ->label('Kamar Tidur')
                    ->required()
                    ->numeric(),
                TextInput::make('bathrooms')
                    ->label('Kamar Mandi')
                    ->required()
                    ->numeric(),
                TextInput::make('carport')
                    ->label('Carport')
                    ->required()
                    ->numeric(),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('house-types')
                    ->imageEditor()
                    ->required(),
                Toggle::make('featured')
                    ->label('Paling Diminati')
                    ->helperText('Tandai sebagai "Paling Diminati".'),
            ]);
    }

    /**
     * Gabungkan pilihan dropdown + isian sendiri menjadi satu kolom `name`.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public static function resolveName(array $data): array
    {
        $choice = $data['name_choice'] ?? 'Blok A';
        $data['name'] = $choice === self::NAME_CUSTOM ? trim((string) ($data['name_custom'] ?? '')) : $choice;

        unset($data['name_choice'], $data['name_custom']);

        return $data;
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public static function fillName(array $data): array
    {
        $name = (string) ($data['name'] ?? '');
        $isPreset = in_array($name, ['Blok A', 'Blok B'], true);

        $data['name_choice'] = $isPreset ? $name : self::NAME_CUSTOM;
        $data['name_custom'] = $isPreset ? null : $name;

        return $data;
    }
}
