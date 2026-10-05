<?php

namespace App\Filament\Resources\HouseTypes\Pages;

use App\Filament\Resources\HouseTypes\HouseTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHouseType extends EditRecord
{
    protected static string $resource = HouseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
