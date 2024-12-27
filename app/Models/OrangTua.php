<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wali',
        'jenis_kelamin',
        'no_hp',
        'pekerjaan',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'siswa_id',
        'alamat'
    ];

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    // Relasi ke model Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    // Relasi ke model Kelurahan
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
