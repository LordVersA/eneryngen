<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceCardResource\Pages;
use App\Filament\Resources\ServiceCardResource\RelationManagers;
use App\Models\ServiceCard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceCardResource extends Resource
{
    protected static ?string $model = ServiceCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationLabel = 'Service Cards';

    protected static ?string $navigationGroup = 'Homepage Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->description('Manage service card content shown on the homepage')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Title')
                            ->helperText('Card title. Use <br> for line breaks in the title.')
                            ->placeholder('Projects, Studies & Advisory')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->label('Description')
                            ->helperText('Card description text')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Call to Action')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('button_text')
                                ->required()
                                ->default('Explore here')
                                ->label('Button Text')
                                ->helperText('Text displayed on the CTA button'),

                            Forms\Components\TextInput::make('button_url')
                                ->required()
                                ->default('#explore')
                                ->label('Button URL')
                                ->helperText('Where the button links to'),
                        ]),
                    ]),

                Forms\Components\Section::make('Styling')
                    ->description('Customize the visual appearance of the card')
                    ->schema([
                        Forms\Components\ColorPicker::make('background_color')
                            ->default('#14b8a6')
                            ->label('Background Color')
                            ->helperText('Choose the card background color')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Icon')
                    ->description('Add an icon to the card')
                    ->schema([
                        Forms\Components\Select::make('icon_type')
                            ->options([
                                'svg' => 'SVG Code',
                                'image' => 'Upload Image',
                            ])
                            ->default('svg')
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
                            ->directory('service-card-icons')
                            ->label('Icon Image')
                            ->helperText('Upload an image (PNG, JPG, SVG)')
                            ->visible(fn (Forms\Get $get) => $get('icon_type') === 'image'),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('order')
                                ->numeric()
                                ->default(0)
                                ->label('Order')
                                ->helperText('Display order (lower numbers appear first)'),

                            Forms\Components\Toggle::make('is_active')
                                ->default(true)
                                ->label('Active')
                                ->helperText('Show/hide this card on the homepage'),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(30)
                    ->sortable(),
                Tables\Columns\ColorColumn::make('background_color')
                    ->label('Color'),
                Tables\Columns\TextColumn::make('button_text')
                    ->label('Button')
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
            ])
            ->defaultSort('order', 'asc');
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
            'index' => Pages\ListServiceCards::route('/'),
            'create' => Pages\CreateServiceCard::route('/create'),
            'edit' => Pages\EditServiceCard::route('/{record}/edit'),
        ];
    }
}
