<?php

namespace App\Imports;

use App\Models\PIP;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // <- penting!
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PIPImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new PIP([
            'nik' => $row['nik'] ?? null,
            'pengusul' => $row['pengusul'] ?? null,
            'pdid' => $row['pdid'] ?? null,
            'nama_siswa' => $row['nama_siswa'] ?? null,
            'nama_sekolah' => $row['nama_sekolah'] ?? null,
            'provinsi' => $row['provinsi'] ?? null,
            'kabupaten' => $row['kabupaten_kota'] ?? null,
            'kecamatan' => $row['kecamatan'] ?? null,
            'nik2' => $row['nik2'] ?? null,
            'nisn' => $row['nisn'] ?? null,
            'npsn' => $row['npsn'] ?? null,
            'kelas' => $row['kelas'] ?? null,
            'rombel' => $row['rombel'] ?? null,
            'semester' => $row['semester'] ?? $row['Semester'] ?? null,
            'jenjang' => $row['jenjang'] ?? null,
            'bentuk' => $row['bentuk'] ?? null,
            'jenis_kelamin' => $row['jenis_kelamin'] ?? $row['Jenis Kelamin'] ?? null,
            'tempat_lahir' => $row['tempat_lahir'] ?? null,
            'tanggal_lahir' => $this->parseTanggal($row['tanggal_lahir'] ?? null),
            'nama_ayah' => $row['nama_ayah'] ?? null,
            'nama_ibu' => $row['nama_ibu'] ?? null,
            'nominal' => $row['nominal'] ?? null,
            'tipe_sk' => $row['tipe_sk'] ?? null,
            'nomor_sk' => $row['nomor_sk'] ?? null,
            'nomor_sk_nominasi' => $row['nomor_sk_nominasi'] ?? null,
            'tanggal_sk' => $this->parseTanggal($row['tanggal_sk'] ?? null),
            'tanggal_sk_nominasi' => $this->parseTanggal($row['tanggal_sk_nominasi'] ?? null),
            'tahap' => $row['tahap'] ?? null,
            'tahap_nominasi' => $row['tahap_nominasi'] ?? null,
            'virtual_account' => $row['virtual_account'] ?? null,
            'virtual_account_nominasi' => $row['virtual_account_nominasi'] ?? null,
            'no_rekening' => $row['no_rekening'] ?? null,
            'bank' => $row['bank'] ?? null,
            'tanggal_aktifasi' => $this->parseTanggal($row['tanggal_aktifasi'] ?? null),
            'tanggal_mulai_pecairan' => $this->parseTanggal($row['tanggal_mulai_pecairan'] ?? null),
            'tanggal_cair' => $this->parseTanggal($row['tanggal_cair'] ?? null),
            'no_kip' => $row['no_kip'] ?? null,
            'no_kks' => $row['no_kks'] ?? null,
            'no_kps' => $row['no_kps'] ?? null,
            'no_pkh' => $row['no_pkh'] ?? null,
            'layak_pip' => $row['layak_pip'] ?? null,
            'nama_pengusul' => $row['nama_pengusul'] ?? null,
            'nama_pengusul_utama' => $row['nama_pengusul_utama'] ?? null,
            'fase' => $row['fase'] ?? null,
            'keterangan_tahap' => $row['keterangan_tahap'] ?? null,
            'keterangan_pencairan' => $row['keterangan_pencairan'] ?? null,
            'keterangan_tambahan' => $row['keterangan_tambahan'] ?? null,
            'status' => $row['status'] ?? null,
            'status2' => $row['status2'] ?? null,
            'no_hp' => $row['nohp'] ?? $row['no_hp'] ?? null,
            'rekomendasi' => $row['rekomendasi'] ?? null,
        ]);
    }

    /**
     * Parse tanggal dari string menjadi format tanggal Laravel (Carbon)
     * Jika gagal parse, akan return null (menghindari error #VALUE!)
     */
    private function parseTanggal($value)
    {
        try {
            return $value ? Carbon::parse($value) : null;
        } catch (\Exception $e) {
            Log::warning("Tanggal tidak valid saat import: " . $value);
            return null;
        }
    }
}
