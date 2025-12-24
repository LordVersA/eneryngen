<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorStatisticResource\Pages;
use App\Models\VisitorStatistic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VisitorStatisticResource extends Resource
{
    protected static ?string $model = VisitorStatistic::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Visitor Statistics';

    protected static ?string $navigationGroup = 'Analytics';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ip_address')
                    ->label('IP Address'),
                Forms\Components\TextInput::make('url')
                    ->label('URL'),
                Forms\Components\TextInput::make('referrer')
                    ->label('Referrer'),
                Forms\Components\TextInput::make('device_type')
                    ->label('Device Type'),
                Forms\Components\TextInput::make('browser')
                    ->label('Browser'),
                Forms\Components\TextInput::make('platform')
                    ->label('Platform'),
                Forms\Components\TextInput::make('country')
                    ->label('Country'),
                Forms\Components\Toggle::make('is_bot')
                    ->label('Is Bot'),
                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Visited At'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('Page')
                    ->limit(40)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('referrer')
                    ->label('Referrer')
                    ->limit(30)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('device_type')
                    ->label('Device')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'desktop' => 'info',
                        'mobile' => 'success',
                        'tablet' => 'warning',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('browser')
                    ->label('Browser')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('platform')
                    ->label('OS')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('country')
                    ->label('Country')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_bot')
                    ->label('Bot')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Visited At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('device_type')
                    ->options([
                        'desktop' => 'Desktop',
                        'mobile' => 'Mobile',
                        'tablet' => 'Tablet',
                    ]),
                Tables\Filters\SelectFilter::make('browser')
                    ->options([
                        'Chrome' => 'Chrome',
                        'Firefox' => 'Firefox',
                        'Safari' => 'Safari',
                        'Edge' => 'Edge',
                        'Opera' => 'Opera',
                    ]),
                Tables\Filters\Filter::make('is_bot')
                    ->query(fn (Builder $query): Builder => $query->where('is_bot', true))
                    ->label('Bots Only'),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitorStatistics::route('/'),
            'view' => Pages\ViewVisitorStatistic::route('/{record}'),
        ];
    }
}
