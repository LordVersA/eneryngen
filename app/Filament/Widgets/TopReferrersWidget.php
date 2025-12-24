<?php

namespace App\Filament\Widgets;

use App\Models\VisitorStatistic;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class TopReferrersWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Top Referrers (Last 30 Days)')
            ->query(
                VisitorStatistic::query()
                    ->where('created_at', '>=', now()->subDays(30))
                    ->where('is_bot', false)
                    ->whereNotNull('referrer')
                    ->where('referrer', '!=', '')
                    ->selectRaw('id, referrer, COUNT(*) as visit_count')
                    ->groupBy('referrer', 'id')
                    ->orderByDesc('visit_count')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('referrer')
                    ->label('Referrer')
                    ->limit(60)
                    ->searchable(),
                Tables\Columns\TextColumn::make('visit_count')
                    ->label('Visits')
                    ->badge()
                    ->color('success')
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
