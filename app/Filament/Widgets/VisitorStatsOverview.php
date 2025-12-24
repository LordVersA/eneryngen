<?php

namespace App\Filament\Widgets;

use App\Models\VisitorStatistic;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VisitorStatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $todayVisits = VisitorStatistic::getVisitsInLastDays(1);
        $weekVisits = VisitorStatistic::getVisitsInLastDays(7);
        $monthVisits = VisitorStatistic::getVisitsInLastDays(30);

        $todayUnique = VisitorStatistic::getUniqueVisitorsInLastDays(1);
        $weekUnique = VisitorStatistic::getUniqueVisitorsInLastDays(7);
        $monthUnique = VisitorStatistic::getUniqueVisitorsInLastDays(30);

        return [
            Stat::make('Today Visits', $todayVisits)
                ->description('Visits in the last 24 hours')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('This Week', $weekVisits)
                ->description('Visits in the last 7 days')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),

            Stat::make('This Month', $monthVisits)
                ->description('Visits in the last 30 days')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('warning'),

            Stat::make('Unique Visitors (Today)', $todayUnique)
                ->description('Unique IP addresses today')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),

            Stat::make('Unique Visitors (Week)', $weekUnique)
                ->description('Unique IP addresses this week')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),

            Stat::make('Unique Visitors (Month)', $monthUnique)
                ->description('Unique IP addresses this month')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
        ];
    }
}
