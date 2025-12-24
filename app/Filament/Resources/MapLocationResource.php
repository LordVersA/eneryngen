<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MapLocationResource\Pages;
use App\Filament\Resources\MapLocationResource\RelationManagers;
use App\Models\MapLocation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MapLocationResource extends Resource
{
    protected static ?string $model = MapLocation::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationLabel = 'Map Locations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Location Details')
                    ->description('Manage office locations shown on the global reach map')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Location Name')
                            ->helperText('e.g., "London, UK" or "Muscat, Oman"')
                            ->placeholder('London, UK'),

                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('latitude')
                                ->required()
                                ->numeric()
                                ->label('Latitude')
                                ->helperText('e.g., 51.5074 for London')
                                ->placeholder('51.5074'),

                            Forms\Components\TextInput::make('longitude')
                                ->required()
                                ->numeric()
                                ->label('Longitude')
                                ->helperText('e.g., -0.1278 for London')
                                ->placeholder('-0.1278'),
                        ]),
                    ]),

                Forms\Components\Section::make('Marker Customization')
                    ->schema([
                        Forms\Components\ColorPicker::make('marker_color')
                            ->default('#00b3c1')
                            ->label('Marker Color')
                            ->helperText('Color of the map marker'),

                        Forms\Components\Textarea::make('info_window_content')
                            ->rows(4)
                            ->label('Info Window Content (Optional)')
                            ->helperText('HTML content shown when marker is clicked')
                            ->placeholder('<h3>London Office</h3><p>123 Street Name</p>'),
                    ]),

                Forms\Components\Section::make('Display Settings')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('order')
                                ->numeric()
                                ->default(0)
                                ->label('Sort Order')
                                ->helperText('Order of markers on the map'),

                            Forms\Components\Toggle::make('is_active')
                                ->default(true)
                                ->label('Active')
                                ->helperText('Show/hide this location'),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->label('Latitude')
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->label('Longitude')
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListMapLocations::route('/'),
            'create' => Pages\CreateMapLocation::route('/create'),
            'edit' => Pages\EditMapLocation::route('/{record}/edit'),
        ];
    }
}
