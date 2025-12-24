<?php

namespace App\Filament\Resources\MapLocationResource\Pages;

use App\Filament\Resources\MapLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMapLocation extends EditRecord
{
    protected static string $resource = MapLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
