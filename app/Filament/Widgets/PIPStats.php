<?php

namespace App\Filament\Resources\PIPResource\Widgets;

use App\Models\PIP;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PIPStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Jumlah Siswa', PIP::count())
                ->description('Total siswa yang terdaftar')
                ->descriptionIcon('heroicon-o-user')
                ->chart(([1, 3, 5, 10, 20, 40]))
                ->color('success'), // hijau

            Card::make('Jumlah Sekolah', PIP::distinct('nama_sekolah')->count('nama_sekolah'))
                ->description('Total sekolah unik')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->chart(([1, 3, 5, 10, 20, 40]))
                ->color('info'), // biru

            Card::make('Jumlah Kecamatan', PIP::distinct('kecamatan')->count('kecamatan'))
                ->description('Total kecamatan tercakup')
                ->descriptionIcon('heroicon-o-map')
                ->chart(([1, 3, 5, 10, 20, 40]))
                ->color('warning'), // kuning
        ];
    }
}
