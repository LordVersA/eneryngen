<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Messages';

    protected static ?string $modelLabel = 'Message';

    protected static ?string $pluralModelLabel = 'Messages';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_read', false)->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('is_read', false)->count() > 0 ? 'warning' : null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->disabled(),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->rows(6)
                    ->disabled()
                    ->columnSpanFull(),
                Forms\Components\Checkbox::make('agreement')
                    ->disabled()
                    ->label('User agreed to data processing'),
                Forms\Components\Toggle::make('is_read')
                    ->label('Mark as Read'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_read')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-envelope')
                    ->trueColor('success')
                    ->falseColor('warning')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),
                Tables\Columns\TextColumn::make('message')
                    ->limit(50)
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received At')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->since(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('is_read')
                    ->label('Status')
                    ->options([
                        '0' => 'Unread',
                        '1' => 'Read',
                    ])
            ])
            ->actions([
                Tables\Actions\Action::make('toggleRead')
                    ->label(fn (Contact $record): string => $record->is_read ? 'Mark as Unread' : 'Mark as Read')
                    ->icon(fn (Contact $record): string => $record->is_read ? 'heroicon-o-envelope' : 'heroicon-o-check-circle')
                    ->color(fn (Contact $record): string => $record->is_read ? 'gray' : 'success')
                    ->action(function (Contact $record) {
                        $record->update(['is_read' => !$record->is_read]);
                    })
                    ->requiresConfirmation(false),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('markAsRead')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn ($records) => $records->each->update(['is_read' => true])),
                    Tables\Actions\BulkAction::make('markAsUnread')
                        ->label('Mark as Unread')
                        ->icon('heroicon-o-envelope')
                        ->color('warning')
                        ->action(fn ($records) => $records->each->update(['is_read' => false])),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'view' => Pages\ViewContact::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
