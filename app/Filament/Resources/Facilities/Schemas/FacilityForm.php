<?php

namespace App\Filament\Resources\Facilities\Schemas;

use App\Support\IconOptions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('icon')
                    ->label('Ikon')
                    ->options(IconOptions::all())
                    ->searchable()
                    ->required(),
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                Textarea::make('desc')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
