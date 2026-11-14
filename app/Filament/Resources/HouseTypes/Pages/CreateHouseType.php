<?php

namespace App\Filament\Resources\HouseTypes\Pages;

use App\Filament\Resources\HouseTypes\HouseTypeResource;
use App\Filament\Resources\HouseTypes\Schemas\HouseTypeForm;
use Filament\Resources\Pages\CreateRecord;

class CreateHouseType extends CreateRecord
{
    protected static string $resource = HouseTypeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return HouseTypeForm::resolveName($data);
    }
}
