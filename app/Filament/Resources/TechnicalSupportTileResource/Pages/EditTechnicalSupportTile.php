<?php

namespace App\Filament\Resources\TechnicalSupportTileResource\Pages;

use App\Filament\Resources\TechnicalSupportTileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechnicalSupportTile extends EditRecord
{
    protected static string $resource = TechnicalSupportTileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
