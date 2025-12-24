<?php

namespace App\Filament\Widgets;

use App\Models\VisitorStatistic;
use Filament\Widgets\ChartWidget;

class BrowserStatsChart extends ChartWidget
{
    protected static ?string $heading = 'Browser Distribution (Last 30 Days)';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = VisitorStatistic::getBrowserStats(30);

        return [
            'datasets' => [
                [
                    'label' => 'Browsers',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#3b82f6',
                        '#10b981',
                        '#f59e0b',
                        '#ef4444',
                        '#8b5cf6',
                        '#ec4899',
                    ],
                ],
            ],
            'labels' => $data->pluck('browser')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
