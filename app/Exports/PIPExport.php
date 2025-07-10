<?php

namespace App\Exports;

use App\Models\PIP;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PIPExport implements FromCollection, WithHeadings
{
    protected $kabupaten;

    public function __construct($kabupaten)
    {
        $this->kabupaten = $kabupaten;
    }

    public function collection()
    {
        return PIP::where('kabupaten', $this->kabupaten)
            ->select([
                'nama_siswa',
                'nama_sekolah',
                'kabupaten',
                'kecamatan',
                'jenjang',
                'kelas',
                'semester',
                'status',
                'fase',
                'nominal',
                'tanggal_cair',
            ])
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Nama Sekolah',
            'Kabupaten',
            'Kecamatan',
            'Jenjang',
            'Kelas',
            'Semester',
            'Status',
            'Fase',
            'Nominal',
            'Tanggal Cair',
        ];
    }
}
