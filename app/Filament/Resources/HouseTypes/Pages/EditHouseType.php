<?php

namespace App\Filament\Resources\HouseTypes\Pages;

use App\Filament\Resources\HouseTypes\HouseTypeResource;
use App\Filament\Resources\HouseTypes\Schemas\HouseTypeForm;
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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return HouseTypeForm::fillName($data);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return HouseTypeForm::resolveName($data);
    }
}
