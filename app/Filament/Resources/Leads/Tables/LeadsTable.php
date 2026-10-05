<?php

namespace App\Filament\Resources\Leads\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('No. WhatsApp')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('house_type')
                    ->label('Tipe Diminati')
                    ->searchable(),
                SelectColumn::make('status')
                    ->options([
                        'new' => 'Baru',
                        'contacted' => 'Dihubungi',
                        'closed' => 'Selesai',
                    ]),
                TextColumn::make('created_at')
                    ->label('Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->label('Detail'),
                DeleteAction::make(),
            ]);
    }
}
