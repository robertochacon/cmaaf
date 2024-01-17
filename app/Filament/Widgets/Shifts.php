<?php

namespace App\Filament\Widgets;

use App\Models\Shifts as ModelsShifts;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class Shifts extends ChartWidget
{
    protected static ?string $heading = 'Turnos';

    protected function getData(): array
    {
        $data = Trend::model(ModelsShifts::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perDay()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Turns',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
