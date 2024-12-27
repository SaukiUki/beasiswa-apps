<?php

namespace App\Filament\Resources\PendidikanResource\Pages;

use App\Filament\Resources\PendidikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListPendidikans extends ListRecords
{
    protected static string $resource = PendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'ALL' => Tab::make('ALL'),
            'SD' => ListRecords\Tab::make()->query(fn($query) => $query->where('jenjang_pendidikan' , 'SD')),
            'SMP' => ListRecords\Tab::make()->query(fn($query) => $query->where('jenjang_pendidikan' , 'SMP')),
            'PERGURUAN TINGGI' => ListRecords\Tab::make()->query(fn($query) => $query->where('jenjang_pendidikan' , 'PERGURUAN TINGGI')),
        ];
    }
}
