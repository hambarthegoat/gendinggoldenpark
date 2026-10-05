<?php

namespace App\Filament\Resources\GalleryItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GalleryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('gallery')
                    ->nullable()
                    ->helperText('Opsional. Jika kosong, tile akan memakai gradient warna di bawah sebagai latar.'),
                TextInput::make('from_class')
                    ->required()
                    ->helperText('Contoh: from-gold-300'),
                TextInput::make('to_class')
                    ->required()
                    ->helperText('Contoh: to-gold-600'),
                Select::make('span')
                    ->options([
                        '' => 'Normal',
                        'sm:col-span-2' => 'Wide',
                        'sm:col-span-2 sm:row-span-2' => 'Besar',
                    ])
                    ->default('')
                    ->required(),
            ]);
    }
}
