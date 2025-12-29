<?php

namespace App\Filament\Resources\KipKuliahResource\Pages;

use App\Filament\Resources\KipKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKipKuliah extends EditRecord
{
    protected static string $resource = KipKuliahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
