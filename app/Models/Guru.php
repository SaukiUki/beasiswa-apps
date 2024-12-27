<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_guru',
        'nip',
        'pendidikan_id',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'jenis_kelamin',
        'email',
        'no_hp',
        'alamat'
    ];

    // Relasi ke model Pendidikan (banyak ke satu)
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }
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
}
