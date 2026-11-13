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
                    ->label('Nama')
                    ->required(),
                TextInput::make('price')
                    ->label('Harga')
                    ->required(),
                TextInput::make('land')
                    ->label('Luas Tanah')
                    ->required(),
                TextInput::make('building')
                    ->label('Luas Bangunan')
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
}
