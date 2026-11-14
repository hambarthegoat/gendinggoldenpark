<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->disabled(),
                TextInput::make('phone')
                    ->label('No. WhatsApp')
                    ->tel()
                    ->disabled(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->disabled(),
                Textarea::make('message')
                    ->label('Pesan')
                    ->disabled()
                    ->columnSpanFull(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'new' => 'Baru',
                        'contacted' => 'Dihubungi',
                        'closed' => 'Selesai',
                    ])
                    ->default('new')
                    ->required(),
            ]);
    }
}
