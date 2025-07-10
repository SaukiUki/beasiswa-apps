<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PIPSiswaPerKabupatenChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Siswa per Kabupaten';
    protected static ?string $maxHeight = '250px';

    protected function getData(): array
    {
        $data = \App\Models\PIP::selectRaw('kabupaten, COUNT(*) as total')
            ->groupBy('kabupaten')
            ->pluck('total', 'kabupaten')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Siswa',
                    'data' => array_values($data),
                    'backgroundColor' => '#facc15',
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
