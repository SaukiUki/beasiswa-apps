<?php

namespace App\Filament\Resources\PIPResource\Pages;

use Filament\Actions;
use App\Imports\PIPImport;
use Filament\Forms\Components\Select;
use Maatwebsite\Excel\Facades\Excel;
use App\Filament\Resources\PIPResource;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;

// ✅ GLOBAL WIDGETS (BENAR)
use App\Filament\Widgets\PIPStats;
use App\Filament\Widgets\PIPSiswaPerKabupatenChart;
use App\Filament\Widgets\PIPSiswaPerKecamatanChart;

class ListPIPS extends ListRecords
{
    protected static string $resource = PIPResource::class;

    /* =========================================================
     * HEADER ACTIONS
     * ========================================================= */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Actions\Action::make('Import Excel')
                ->label('Import Excel')
                ->icon('heroicon-o-arrow-up-tray')
                ->form([
                    FileUpload::make('file')
                        ->label('Pilih File Excel')
                        ->disk('local')
                        ->directory('livewire-tmp')
                        ->required()
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel',
                            'text/csv',
                        ]),
                ])
                ->action(function (array $data) {
                    $relativePath = $data['file'];
                    $absolutePath = Storage::disk('local')->path($relativePath);

                    if (!file_exists($absolutePath)) {
                        Notification::make()
                            ->title('File tidak ditemukan')
                            ->body("Path: {$absolutePath}")
                            ->danger()
                            ->send();
                        return;
                    }

                    Excel::import(new PIPImport, $absolutePath);

                    Notification::make()
                        ->title('Import berhasil!')
                        ->success()
                        ->send();
                }),

            Actions\Action::make('Export Excel')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->form([
                    Select::make('kabupaten')
                        ->label('Kabupaten')
                        ->options(
                            \App\Models\PIP::query()
                                ->select('kabupaten')
                                ->distinct()
                                ->whereNotNull('kabupaten')
                                ->orderBy('kabupaten')
                                ->pluck('kabupaten', 'kabupaten')
                                ->toArray()
                        )
                        ->searchable()
                        ->required(),
                ])
                ->action(function (array $data) {
                    $kabupaten = $data['kabupaten'];

                    $fileName = 'export_pip_' . str($kabupaten)->slug() . '_' . now()->format('Ymd_His') . '.xlsx';

                    return Excel::download(
                        new \App\Exports\PIPExport($kabupaten),
                        $fileName
                    );
                }),
        ];
    }

    /* =========================================================
     * HEADER WIDGETS
     * ========================================================= */
    protected function getHeaderWidgets(): array
    {
        return [
            PIPStats::class,
            PIPSiswaPerKecamatanChart::class,
            PIPSiswaPerKabupatenChart::class,
        ];
    }
}
