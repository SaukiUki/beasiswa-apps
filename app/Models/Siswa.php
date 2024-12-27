<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'jenis_kelamin',
        'email',
        'no_hp',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'pendidikan_id',
        'status',
        'alamat',
    ];

    // Relasi ke model Kota
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

    // Relasi ke model Pendidikan
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }
    public function orang_tua()
    {
        return $this->belongsTo(OrangTua::class);
    }
}
