<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KipKuliah extends Model
{
  use HasFactory;

  protected $fillable = [
    'nisn',
    'nama_mahasiswa',
    'nim',
    'perguruan_tinggi',
    'program_studi',
    'jenjang',
    'semester',
    'tahun_masuk',
    'nominal',
    'status_pengajuan',
    'status',
  ];

  /**
   * Relasi ke Siswa (unit NISN)
   */
  public function siswa()
  {
    return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
  }
}
