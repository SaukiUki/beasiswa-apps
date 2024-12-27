<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Pendidikan;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SiswaWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Siswa', Siswa::count())
            ->description('Jumlah Siswa/Mahasiswa Terdata')
            ->descriptionIcon('heroicon-o-users', IconPosition::Before)
            ->chart(([1,3,5,10,20,40]))
            ->color('success'),
            Stat::make('Jumlah Instansi Pendidikan', Pendidikan::count())
            ->description('Jumlah Instansi PendidikanTerdata')
            ->descriptionIcon('heroicon-o-academic-cap', IconPosition::Before)
            ->chart(([1,3,5,10,20,40]))
            ->color('primary'),
            Stat::make('Jumlah Guru', Guru::count())
            ->description('Jumlah Guru Terdata')
            ->descriptionIcon('heroicon-o-user-plus', IconPosition::Before)
            ->chart(([1,3,5,10,20,40]))
            ->color('info'),
        ];
    }
}
