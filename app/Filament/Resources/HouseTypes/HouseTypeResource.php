<?php

namespace App\Filament\Resources\HouseTypes;

use App\Filament\Resources\HouseTypes\Pages\CreateHouseType;
use App\Filament\Resources\HouseTypes\Pages\EditHouseType;
use App\Filament\Resources\HouseTypes\Pages\ListHouseTypes;
use App\Filament\Resources\HouseTypes\Schemas\HouseTypeForm;
use App\Filament\Resources\HouseTypes\Tables\HouseTypesTable;
use App\Models\HouseType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HouseTypeResource extends Resource
{
    protected static ?string $model = HouseType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    public static function form(Schema $schema): Schema
    {
        return HouseTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HouseTypesTable::configure($table);
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
            'index' => ListHouseTypes::route('/'),
            'create' => CreateHouseType::route('/create'),
            'edit' => EditHouseType::route('/{record}/edit'),
        ];
    }
}
