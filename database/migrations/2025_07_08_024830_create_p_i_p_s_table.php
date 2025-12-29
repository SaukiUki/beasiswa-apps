<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('p_i_p_s', function (Blueprint $table) {
             $table->id();
    $table->uuid('pdid')->nullable();
    $table->string('nama_siswa')->nullable();
    $table->string('nama_sekolah')->nullable();
    $table->string('provinsi')->nullable();
    $table->string('kabupaten')->nullable();
    $table->string('kecamatan')->nullable();
    $table->string('nik')->nullable();
    $table->string('nisn')->nullable(); // acuan utama, BELUM unique
    $table->string('npsn')->nullable();
    $table->string('kelas')->nullable();
    $table->string('rombel')->nullable();
    $table->string('semester')->nullable(); // dari "Semeter"
    $table->string('jenjang')->nullable();
    $table->string('bentuk')->nullable();
    $table->string('jenis_kelamin')->nullable(); // dari "JK"
    $table->string('tempat_lahir')->nullable();
    $table->date('tanggal_lahir')->nullable();
    $table->string('nama_ayah')->nullable();
    $table->string('nama_ibu')->nullable();
    $table->bigInteger('nominal')->nullable();
    $table->string('tipe_sk')->nullable();
    $table->string('nomor_sk')->nullable();
    $table->string('nomor_sk_nominasi')->nullable();
    $table->date('tanggal_sk')->nullable();
    $table->date('tanggal_sk_nominasi')->nullable();
    $table->string('tahap')->nullable();
    $table->string('tahap_nominasi')->nullable();
    $table->string('virtual_account')->nullable();
    $table->string('virtual_account_nominasi')->nullable();
    $table->string('no_rekening')->nullable();
    $table->string('bank')->nullable();
    $table->date('tanggal_aktifasi')->nullable();
    $table->date('tanggal_mulai_pencairan')->nullable();
    $table->date('tanggal_cair')->nullable();
    $table->string('no_kip')->nullable();
    $table->string('no_kks')->nullable();
    $table->string('no_kps')->nullable();
    $table->string('no_pkh')->nullable();
    $table->string('layak_pip')->nullable();
    $table->string('nama_pengusul')->nullable();
    $table->string('nama_pengusul_utama')->nullable();
    $table->string('fase')->nullable();
    $table->text('keterangan_tahap')->nullable();
    $table->text('keterangan_pencairan')->nullable();
    $table->text('keterangan_tambahan')->nullable();
    $table->string('status')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_i_p_s');
    }
};
