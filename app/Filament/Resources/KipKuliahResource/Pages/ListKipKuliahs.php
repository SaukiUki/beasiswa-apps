<?php

namespace App\Filament\Resources\KipKuliahResource\Pages;

use App\Filament\Resources\KipKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\KipKuliahStats;

class ListKipKuliahs extends ListRecords
{
    protected static string $resource = KipKuliahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            KipKuliahStats::class,
        ];
    }
}
