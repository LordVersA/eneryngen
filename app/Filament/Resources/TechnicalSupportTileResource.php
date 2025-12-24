<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechnicalSupportTileResource\Pages;
use App\Filament\Resources\TechnicalSupportTileResource\RelationManagers;
use App\Models\TechnicalSupportTile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechnicalSupportTileResource extends Resource
{
    protected static ?string $model = TechnicalSupportTile::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Technical Support Tile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->description('Manage the "On Demand Technical Support" tile content shown on the homepage')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Title')
                            ->helperText('Displayed as the main heading (e.g., "On Demand Technical Support"). Use \n for line breaks.')
                            ->placeholder('On Demand Technical Support')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->label('Description')
                            ->helperText('Main description text shown in the tile')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Call to Action')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('button_text')
                                ->required()
                                ->default('Contact us')
                                ->label('Button Text')
                                ->helperText('Text displayed on the CTA button'),

                            Forms\Components\TextInput::make('button_url')
                                ->required()
                                ->default('#contact')
                                ->label('Button URL')
                                ->helperText('Where the button links to (e.g., #contact or /services)'),
                        ]),
                    ]),

                Forms\Components\Section::make('Styling')
                    ->description('Customize the visual appearance of the tile')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\ColorPicker::make('border_accent_color')
                                ->default('#00b3c1')
                                ->label('Left Border Color')
                                ->helperText('Color of the left accent border'),

                            Forms\Components\TextInput::make('background_color')
                                ->label('Background Color')
                                ->helperText('CSS gradient or solid color')
                                ->default('linear-gradient(135deg, rgba(249, 250, 251, 0.6) 0%, rgba(243, 244, 246, 0.8) 100%)'),
                        ]),
                    ]),

                Forms\Components\Section::make('Icon (Optional)')
                    ->description('Add an icon to the tile')
                    ->schema([
                        Forms\Components\Select::make('icon_type')
                            ->options([
                                'none' => 'No Icon',
                                'svg' => 'SVG Code',
                                'image' => 'Upload Image',
                            ])
                            ->default('none')
                            ->reactive()
                            ->label('Icon Type'),

                        Forms\Components\Textarea::make('icon_svg')
                            ->label('SVG Code')
                            ->rows(6)
                            ->helperText('Paste SVG code here')
                            ->visible(fn (Forms\Get $get) => $get('icon_type') === 'svg'),

                        Forms\Components\FileUpload::make('icon_image')
                            ->image()
                            ->disk('public')
                            ->directory('technical-support-icons')
                            ->label('Icon Image')
                            ->helperText('Upload an image (PNG, JPG, SVG)')
                            ->visible(fn (Forms\Get $get) => $get('icon_type') === 'image'),
                    ]),

                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->label('Active')
                    ->helperText('Show/hide this tile on the homepage'),
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
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('button_text')
                    ->label('Button Text')
                    ->searchable(),
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
            'index' => Pages\ListTechnicalSupportTiles::route('/'),
            'create' => Pages\CreateTechnicalSupportTile::route('/create'),
            'edit' => Pages\EditTechnicalSupportTile::route('/{record}/edit'),
        ];
    }
}
