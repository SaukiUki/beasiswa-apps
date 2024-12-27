<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'jenjang_pendidikan',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'alamat',
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
    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
}
