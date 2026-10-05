<?php

namespace App\Filament\Resources\HouseTypes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HouseTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('price')
                    ->required(),
                TextInput::make('land')
                    ->required(),
                TextInput::make('building')
                    ->required(),
                TextInput::make('bedrooms')
                    ->required()
                    ->numeric(),
                TextInput::make('bathrooms')
                    ->required()
                    ->numeric(),
                TextInput::make('carport')
                    ->required()
                    ->numeric(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('house-types')
                    ->nullable()
                    ->helperText('Opsional. Jika kosong, kartu akan memakai gradient warna di bawah sebagai latar.'),
                TextInput::make('gradient_classes')
                    ->required()
                    ->helperText('Kelas gradient Tailwind, contoh: from-amber-300 to-amber-500. Dipakai jika foto tidak diisi.'),
                Toggle::make('featured')
                    ->helperText('Tandai sebagai "Paling Diminati".'),
            ]);
    }
}
