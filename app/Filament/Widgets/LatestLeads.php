<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestLeads extends TableWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function getTableHeading(): string
    {
        return 'Leads Terbaru';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Lead::query()->latest()->limit(5))
            ->paginated(false)
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('No. WhatsApp'),
                TextColumn::make('house_type')
                    ->label('Tipe Diminati')
                    ->placeholder('—'),
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
            ->recordActions([
                EditAction::make()->label('Detail')->url(fn (Lead $record) => "/admin/leads/{$record->id}/edit"),
            ]);
    }
}
