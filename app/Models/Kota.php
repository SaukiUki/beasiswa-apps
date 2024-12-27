<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kota'];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function orang_tua()
    {
        return $this->hasMany(OrangTua::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
