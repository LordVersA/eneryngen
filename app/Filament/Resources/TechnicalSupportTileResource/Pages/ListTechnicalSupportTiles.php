<?php

namespace App\Filament\Resources\TechnicalSupportTileResource\Pages;

use App\Filament\Resources\TechnicalSupportTileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechnicalSupportTiles extends ListRecords
{
    protected static string $resource = TechnicalSupportTileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
