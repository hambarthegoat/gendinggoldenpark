<?php

namespace App\Filament\Resources\AccessPoints\Pages;

use App\Filament\Resources\AccessPoints\AccessPointResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAccessPoint extends EditRecord
{
    protected static string $resource = AccessPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
