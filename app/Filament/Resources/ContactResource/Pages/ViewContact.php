<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('toggleRead')
                ->label(fn (): string => $this->record->is_read ? 'Mark as Unread' : 'Mark as Read')
                ->icon(fn (): string => $this->record->is_read ? 'heroicon-o-envelope' : 'heroicon-o-check-circle')
                ->color(fn (): string => $this->record->is_read ? 'gray' : 'success')
                ->action(function () {
                    $this->record->update(['is_read' => !$this->record->is_read]);
                    $this->refreshFormData(['is_read']);
                }),
            Actions\DeleteAction::make(),
        ];
    }
}