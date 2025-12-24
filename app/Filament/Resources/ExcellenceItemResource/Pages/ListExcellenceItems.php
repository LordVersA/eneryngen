<?php

namespace App\Filament\Resources\ExcellenceItemResource\Pages;

use App\Filament\Resources\ExcellenceItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExcellenceItems extends ListRecords
{
    protected static string $resource = ExcellenceItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
