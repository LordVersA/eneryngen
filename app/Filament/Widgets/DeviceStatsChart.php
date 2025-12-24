<?php

namespace App\Filament\Widgets;

use App\Models\VisitorStatistic;
use Filament\Widgets\ChartWidget;

class DeviceStatsChart extends ChartWidget
{
    protected static ?string $heading = 'Device Types (Last 30 Days)';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = VisitorStatistic::getDeviceStats(30);

        return [
            'datasets' => [
                [
                    'label' => 'Devices',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#3b82f6',
                        '#10b981',
                        '#f59e0b',
                        '#ef4444',
                    ],
                ],
            ],
            'labels' => $data->pluck('device_type')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
