<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Filament\Resources\SiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListSiswas extends ListRecords
{
    protected static string $resource = SiswaResource::class;

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
            'Aktif' => ListRecords\Tab::make()->query(fn($query) => $query->where('status' , 'aktif')),
            'Tidak Aktif' => ListRecords\Tab::make()->query(fn($query) => $query->where('status' , 'tidak aktif'))
        ];
    }
}
