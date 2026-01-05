<?php

namespace App\Filament\Resources\SiteSeoSettingResource\Pages;

use App\Filament\Resources\SiteSeoSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteSeoSetting extends EditRecord
{
    protected static string $resource = SiteSeoSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
