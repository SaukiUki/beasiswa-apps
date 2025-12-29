<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'nisn',            // 🔑 KUNCI UTAMA
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

    /* =========================================================
     * RELATIONSHIPS
     * ========================================================= */

    /**
     * Relasi ke Kota
     */
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    /**
     * Relasi ke Kecamatan
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    /**
     * Relasi ke Kelurahan
     */
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    /**
     * Relasi ke Pendidikan
     */
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

    /**
     * Relasi ke PIP
     * 1 Siswa = 1 PIP (berdasarkan NISN)
     */
    public function pip()
    {
        return $this->hasOne(PIP::class, 'nisn', 'nisn');
    }

    /**
     * Relasi ke Orang Tua
     * (sementara disiapkan, menu di-hide)
     */
    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }
}
