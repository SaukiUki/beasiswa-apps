<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = ['kota_id' ,'kecamatan_id', 'nama_kelurahan'];

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function guru()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function orang_tua()
    {
        return $this->hasMany(OrangTua::class);
    }
}
