<?php

namespace App\Filament\Resources\VisitorStatisticResource\Pages;

use App\Filament\Resources\VisitorStatisticResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVisitorStatistic extends ViewRecord
{
    protected static string $resource = VisitorStatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
