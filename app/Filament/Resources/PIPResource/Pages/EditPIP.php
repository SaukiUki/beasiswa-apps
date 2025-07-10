<?php

namespace App\Filament\Resources\PIPResource\Pages;

use App\Filament\Resources\PIPResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPIP extends EditRecord
{
    protected static string $resource = PIPResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
