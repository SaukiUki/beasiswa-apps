<?php

namespace App\Exports;

use App\Models\Pip;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Exportable;

class PIPExport implements
    FromQuery,
    WithHeadings,
    WithChunkReading,
    ShouldQueue
{
    use Exportable;

    public function query()
    {
        return Pip::query()
            ->select([
                'pdid',
                'nama_siswa',
                'nama_sekolah',
                'provinsi',
                'kabupaten',
                'kecamatan',
                'nik',
                'nisn',
                'npsn',
                'kelas',
                'rombel',
                'semester',
                'jenjang',
                'bentuk',
                'jenis_kelamin',
                'tempat_lahir',
                'tanggal_lahir',
                'nama_ayah',
                'nama_ibu',
                'nominal',
                'tipe_sk',
                'nomor_sk',
                'nomor_sk',
                'nomor_sk_nominasi',
                'tanggal_sk',
                'tanggal_sk_nominasi',
                'tahap',
                'tahap_nominasi',
                'virtual_account',
                'virtual_account_nominasi',
                'no_rekening',
                'bank',
                'tanggal_aktifasi',
                'tanggal_mulai_pencairan',
                'tanggal_cair',
                'no_kip',
                'no_kks',
                'no_kps',
                'no_pkh',
                'layak_pip',
                'nama_pengusul',
                'nama_pengusul_utama',
                'fase',
                'keterangan_tahap',
                'keterangan_pencairan',
                'keterangan_tambahan',
                'status',
            ])
            ->orderBy('nama_siswa');
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function headings(): array
    {
        return [
            'PDID',
            'Nama Siswa',
            'Nama Sekolah',
            'Provinsi',
            'Kabupaten / Kota',
            'Kecamatan',
            'NIK',
            'NISN',
            'NPSN',
            'Kelas',
            'Rombel',
            'Semeter',
            'Jenjang',
            'Bentuk',
            'JK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Nama Ayah',
            'Nama Ibu',
            'Nominal',
            'Tipe SK',
            'Nomor SK',
            'Nomor SK Nominasi',
            'Tanggal SK',
            'Tanggal SK Nominasi',
            'Tahap',
            'Tahap Nominasi',
            'Virtual Account',
            'Virtual Account Nominasi',
            'No. Rekening',
            'Bank',
            'Tanggal Aktifasi',
            'Tanggal Mulai Pecairan',
            'Tanggal Cair',
            'No. KIP',
            'No. KKS',
            'No. KPS',
            'No. PKH',
            'Layak PIP',
            'Nama Pengusul',
            'Nama Pengusul Utama',
            'Fase',
            'Keterangan Tahap',
            'Keterangan Pencairan',
            'Keterangan Tambahan',
            'Status',
        ];
    }
}
