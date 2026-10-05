<?php

namespace App\Filament\Resources\Stats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('value')
                    ->required(),
                TextInput::make('label')
                    ->required(),
            ]);
    }
}
