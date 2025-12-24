<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExcellenceItemResource\Pages;
use App\Filament\Resources\ExcellenceItemResource\RelationManagers;
use App\Models\ExcellenceItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExcellenceItemResource extends Resource
{
    protected static ?string $model = ExcellenceItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationLabel = 'Excellence Items';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->description('Manage excellence carousel items shown in the "Integrated Excellence" section')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Title')
                            ->helperText('Service or expertise name (e.g., "Well Testing"). Use \n for line breaks.')
                            ->placeholder('Well Testing'),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->label('Description')
                            ->helperText('Brief description of this service/expertise')
                            ->columnSpanFull(),

                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('link_text')
                                ->required()
                                ->default('Learn more')
                                ->label('Link Text')
                                ->helperText('Text for the "Learn more" link'),

                            Forms\Components\TextInput::make('link_url')
                                ->required()
                                ->default('#learn-more')
                                ->label('Link URL')
                                ->helperText('Where the link points to'),
                        ]),
                    ]),

                Forms\Components\Section::make('Icon')
                    ->schema([
                        Forms\Components\Select::make('icon_type')
                            ->options([
                                'svg' => 'SVG Code',
                                'image' => 'Upload Image',
                            ])
                            ->default('svg')
                            ->reactive()
                            ->required()
                            ->label('Icon Type'),

                        Forms\Components\Textarea::make('icon_svg')
                            ->label('SVG Code')
                            ->rows(8)
                            ->helperText('Paste Heroicon or custom SVG code')
                            ->visible(fn (Forms\Get $get) => $get('icon_type') === 'svg'),

                        Forms\Components\FileUpload::make('icon_image')
                            ->image()
                            ->disk('public')
                            ->directory('excellence-icons')
                            ->label('Icon Image')
                            ->visible(fn (Forms\Get $get) => $get('icon_type') === 'image'),

                        Forms\Components\Toggle::make('icon_primary_style')
                            ->label('Use Primary Gradient Style')
                            ->helperText('Enable to use the teal gradient background for the icon (like "Geosciences")')
                            ->default(false),
                    ]),

                Forms\Components\Section::make('Display Settings')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('order')
                                ->numeric()
                                ->default(0)
                                ->label('Sort Order')
                                ->helperText('Lower numbers appear first'),

                            Forms\Components\Toggle::make('is_active')
                                ->default(true)
                                ->label('Active')
                                ->helperText('Show/hide this item'),
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
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->reorderable('order')
            ->defaultSort('order');
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
            'index' => Pages\ListExcellenceItems::route('/'),
            'create' => Pages\CreateExcellenceItem::route('/create'),
            'edit' => Pages\EditExcellenceItem::route('/{record}/edit'),
        ];
    }
}
