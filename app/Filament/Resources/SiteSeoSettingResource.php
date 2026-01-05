<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSeoSettingResource\Pages;
use App\Filament\Resources\SiteSeoSettingResource\RelationManagers;
use App\Models\SiteSeoSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiteSeoSettingResource extends Resource
{
    protected static ?string $model = SiteSeoSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass-circle';

    protected static ?string $navigationLabel = 'SEO Settings';

    protected static ?string $modelLabel = 'SEO Settings';

    protected static ?int $navigationSort = 99;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('SEO Settings')
                    ->tabs([
                        // Basic SEO Tab
                        Forms\Components\Tabs\Tab::make('Basic SEO')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('site_title')
                                    ->label('Site Title')
                                    ->placeholder('Your Site Title')
                                    ->helperText('Main title of your website (appears in browser tab and search results)')
                                    ->maxLength(60)
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('site_description')
                                    ->label('Meta Description')
                                    ->placeholder('A brief description of your website')
                                    ->helperText('Description for search engines (150-160 characters recommended)')
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('site_keywords')
                                    ->label('Meta Keywords')
                                    ->placeholder('keyword1, keyword2, keyword3')
                                    ->helperText('Comma-separated keywords (mostly for legacy purposes)')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('author')
                                    ->label('Author')
                                    ->placeholder('Your Company Name')
                                    ->helperText('The author or owner of the website'),

                                Forms\Components\TextInput::make('canonical_url')
                                    ->label('Canonical URL')
                                    ->url()
                                    ->placeholder('https://example.com')
                                    ->helperText('The primary domain of your website'),
                            ]),

                        // Social Media Tab
                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Forms\Components\Section::make('Open Graph (Facebook, LinkedIn)')
                                    ->description('Settings for how your site appears when shared on Facebook, LinkedIn, etc.')
                                    ->schema([
                                        Forms\Components\TextInput::make('og_title')
                                            ->label('OG Title')
                                            ->placeholder('Your Site Title')
                                            ->helperText('Title when shared on social media')
                                            ->maxLength(60)
                                            ->columnSpanFull(),

                                        Forms\Components\Textarea::make('og_description')
                                            ->label('OG Description')
                                            ->placeholder('Description for social media')
                                            ->helperText('Description when shared (max 200 characters)')
                                            ->rows(3)
                                            ->maxLength(200)
                                            ->columnSpanFull(),

                                        Forms\Components\FileUpload::make('og_image')
                                            ->label('OG Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('seo')
                                            ->helperText('Image when shared on social media (1200x630px recommended)')
                                            ->imageEditor()
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('og_type')
                                            ->label('OG Type')
                                            ->default('website')
                                            ->helperText('Type of content (website, article, etc.)'),

                                        Forms\Components\TextInput::make('og_locale')
                                            ->label('OG Locale')
                                            ->default('en_US')
                                            ->helperText('Language locale (e.g., en_US, fa_IR)'),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Twitter Card')
                                    ->description('Settings for how your site appears when shared on Twitter/X')
                                    ->schema([
                                        Forms\Components\Select::make('twitter_card_type')
                                            ->label('Card Type')
                                            ->options([
                                                'summary' => 'Summary',
                                                'summary_large_image' => 'Summary with Large Image',
                                                'app' => 'App',
                                                'player' => 'Player',
                                            ])
                                            ->default('summary_large_image')
                                            ->helperText('How the card should be displayed'),

                                        Forms\Components\TextInput::make('twitter_site')
                                            ->label('Twitter Site Handle')
                                            ->placeholder('@yourusername')
                                            ->helperText('Your Twitter/X username (include @)'),

                                        Forms\Components\TextInput::make('twitter_creator')
                                            ->label('Twitter Creator Handle')
                                            ->placeholder('@yourusername')
                                            ->helperText('Content creator Twitter/X username (include @)'),
                                    ])
                                    ->columns(3),
                            ]),

                        // Tracking & Analytics Tab
                        Forms\Components\Tabs\Tab::make('Tracking & Analytics')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Forms\Components\TextInput::make('google_analytics_id')
                                    ->label('Google Analytics ID')
                                    ->placeholder('G-XXXXXXXXXX or UA-XXXXXXXXX-X')
                                    ->helperText('Your Google Analytics tracking ID')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('google_tag_manager_id')
                                    ->label('Google Tag Manager ID')
                                    ->placeholder('GTM-XXXXXXX')
                                    ->helperText('Your Google Tag Manager container ID')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('facebook_pixel_id')
                                    ->label('Facebook Pixel ID')
                                    ->placeholder('XXXXXXXXXXXXXXX')
                                    ->helperText('Your Facebook Pixel ID for conversion tracking')
                                    ->columnSpanFull(),
                            ]),

                        // Technical SEO Tab
                        Forms\Components\Tabs\Tab::make('Technical SEO')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Select::make('robots_meta')
                                    ->label('Robots Meta Tag')
                                    ->options([
                                        'index, follow' => 'Index, Follow (Recommended)',
                                        'noindex, nofollow' => 'No Index, No Follow',
                                        'index, nofollow' => 'Index, No Follow',
                                        'noindex, follow' => 'No Index, Follow',
                                    ])
                                    ->default('index, follow')
                                    ->helperText('Controls how search engines crawl and index your site')
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('googlebot_meta')
                                    ->label('Googlebot Meta Tag')
                                    ->placeholder('index, follow')
                                    ->helperText('Specific instructions for Google\'s crawler (optional)')
                                    ->columnSpanFull(),
                            ]),

                        // Branding & Visual Tab
                        Forms\Components\Tabs\Tab::make('Branding & Visual')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\FileUpload::make('favicon')
                                    ->label('Favicon')
                                    ->image()
                                    ->disk('public')
                                    ->directory('seo')
                                    ->helperText('Website favicon (32x32px or 16x16px, .ico or .png)')
                                    ->imageEditor()
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('theme_color')
                                    ->label('Theme Color')
                                    ->placeholder('#000000')
                                    ->helperText('Browser theme color (hex code)')
                                    ->columnSpanFull(),

                                Forms\Components\Section::make('Organization Schema (Schema.org)')
                                    ->description('Structured data about your organization for search engines')
                                    ->schema([
                                        Forms\Components\TextInput::make('organization_name')
                                            ->label('Organization Name')
                                            ->placeholder('Your Company Name')
                                            ->columnSpanFull(),

                                        Forms\Components\Textarea::make('organization_description')
                                            ->label('Organization Description')
                                            ->placeholder('Brief description of your organization')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        Forms\Components\FileUpload::make('organization_logo')
                                            ->label('Organization Logo')
                                            ->image()
                                            ->disk('public')
                                            ->directory('seo')
                                            ->helperText('Your company logo for search results')
                                            ->imageEditor()
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_title')
                    ->label('Site Title')
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('site_description')
                    ->label('Description')
                    ->limit(60)
                    ->toggleable(),

                Tables\Columns\IconColumn::make('favicon')
                    ->label('Has Favicon')
                    ->boolean()
                    ->getStateUsing(fn($record) => !empty($record->favicon)),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Disabled bulk actions for singleton resource
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
            'index' => Pages\ListSiteSeoSettings::route('/'),
            'create' => Pages\CreateSiteSeoSetting::route('/create'),
            'edit' => Pages\EditSiteSeoSetting::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        // Only allow creation if no record exists (singleton pattern)
        return SiteSeoSetting::count() === 0;
    }
}
