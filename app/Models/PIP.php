<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PIP extends Model
{

    // (Opsional) Jika nama tabel bukan jamak dari nama model
    // protected $table = 'pips';

    // Daftar kolom yang dapat diisi massal (dari form atau seeder)
    protected $fillable = [
        'nik',
        'pengusul',
        'pdid',
        'nama_siswa',
        'nama_sekolah',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'nik2',
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
        'status2',
        'no_hp',
        'rekomendasi',
    ];

    // Jika ingin konversi otomatis tanggal
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_sk' => 'date',
        'tanggal_sk_nominasi' => 'date',
        'tanggal_aktifasi' => 'date',
        'tanggal_mulai_pencairan' => 'date',
        'tanggal_cair' => 'date',
    ];
}
