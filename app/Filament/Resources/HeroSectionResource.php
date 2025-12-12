<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Filament\Resources\HeroSectionResource\RelationManagers;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('page')
                    ->options([
                        'home' => 'Home Page',
                        'projects' => 'Projects Page',
                        'services' => 'Services Page',
                    ])
                    ->required()
                    ->label('Page')
                    ->helperText('Which page is this hero section for?'),
                Forms\Components\TextInput::make('badge_text')
                    ->label('Badge Text')
                    ->helperText('Small text above the title (e.g., "INNOVATION IN ENERGY")')
                    ->placeholder('e.g., INNOVATION IN ENERGY'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Hero Title')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('subtitle')
                    ->columnSpanFull()
                    ->label('Hero Subtitle'),
                Forms\Components\FileUpload::make('background_image')
                    ->image()
                    ->disk('public')
                    ->directory('hero-sections')
                    ->label('Background Image')
                    ->helperText('Recommended size: 1920x1080px or larger'),
                Forms\Components\TextInput::make('cta_text')
                    ->label('Call-to-Action Button Text')
                    ->helperText('Leave empty to hide CTA button'),
                Forms\Components\TextInput::make('cta_url')
                    ->label('Call-to-Action Button URL')
                    ->helperText('e.g., #capabilities or /contact'),
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true)
                    ->label('Active')
                    ->helperText('Uncheck to hide this hero section'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('page')
                    ->label('Page')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'home' => 'info',
                        'projects' => 'success',
                        'services' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('badge_text')
                    ->label('Badge')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}
