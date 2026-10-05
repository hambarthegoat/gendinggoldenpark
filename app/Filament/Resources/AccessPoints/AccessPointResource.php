<?php

namespace App\Filament\Resources\AccessPoints;

use App\Filament\Resources\AccessPoints\Pages\CreateAccessPoint;
use App\Filament\Resources\AccessPoints\Pages\EditAccessPoint;
use App\Filament\Resources\AccessPoints\Pages\ListAccessPoints;
use App\Filament\Resources\AccessPoints\Schemas\AccessPointForm;
use App\Filament\Resources\AccessPoints\Tables\AccessPointsTable;
use App\Models\AccessPoint;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AccessPointResource extends Resource
{
    protected static ?string $model = AccessPoint::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    public static function form(Schema $schema): Schema
    {
        return AccessPointForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AccessPointsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAccessPoints::route('/'),
            'create' => CreateAccessPoint::route('/create'),
            'edit' => EditAccessPoint::route('/{record}/edit'),
        ];
    }
}
