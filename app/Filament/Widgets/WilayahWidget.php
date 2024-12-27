<?php

namespace App\Filament\Widgets;

use App\Models\Mitra;
use App\Models\Siswa;
use App\Models\Kelurahan;
use App\Models\Pendidikan;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class WilayahWidget extends ChartWidget
{
    protected static ?string $heading = 'Data Mitra';

    protected function getData(): array
    {
        $data = Trend::model(Mitra::class)
        ->between(
            start: now()->subMonths(6),
            end: now()
        )
        ->perMonth()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Mitra',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
