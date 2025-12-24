<?php

namespace App\Filament\Widgets;

use App\Models\VisitorStatistic;
use Filament\Widgets\ChartWidget;

class VisitorChart extends ChartWidget
{
    protected static ?string $heading = 'Daily Visitors (Last 30 Days)';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = VisitorStatistic::getDailyVisits(30);

        $labels = [];
        $values = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $labels[] = now()->subDays($i)->format('M d');

            $found = $data->firstWhere('date', $date);
            $values[] = $found ? $found->count : 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => $values,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
