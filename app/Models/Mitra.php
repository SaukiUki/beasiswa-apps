<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'nama_mitra',
        'instansi',
        'jabatan',
        'jenis_kelamin',
        'no_hp',
        'email',
        'alamat',

    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
