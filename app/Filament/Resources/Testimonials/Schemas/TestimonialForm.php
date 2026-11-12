<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('role')
                    ->label('Keterangan')
                    ->required(),
                Textarea::make('quote')
                    ->label('Kutipan Testimoni')
                    ->required()
                    ->columnSpanFull(),
                Select::make('rating')
                    ->label('Rating (bintang)')
                    ->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])
                    ->default(5)
                    ->required(),
            ]);
    }
}
