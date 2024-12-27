<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    protected $fillable = ['kota_id', 'nama_kecamatan'];

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
    public function orang_tua()
    {
        return $this->hasMany(OrangTua::class);
    }
}
