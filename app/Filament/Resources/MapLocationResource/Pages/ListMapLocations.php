<?php

namespace App\Filament\Resources\MapLocationResource\Pages;

use App\Filament\Resources\MapLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMapLocations extends ListRecords
{
    protected static string $resource = MapLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
