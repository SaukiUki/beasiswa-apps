<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PIPSiswaPerKecamatanChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Siswa per Kecamatan';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = \App\Models\PIP::selectRaw('kecamatan, COUNT(*) as total')
            ->groupBy('kecamatan')
            ->pluck('total', 'kecamatan')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Siswa',
                    'data' => array_values($data),
                    'backgroundColor' => '#4ade80',
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
