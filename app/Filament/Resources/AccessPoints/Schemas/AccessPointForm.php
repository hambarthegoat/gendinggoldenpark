<?php

namespace App\Filament\Resources\AccessPoints\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AccessPointForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('text')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
