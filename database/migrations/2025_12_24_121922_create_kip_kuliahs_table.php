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
        Schema::create('kip_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nama_mahasiswa');
            $table->string('nim')->nullable();
            $table->string('perguruan_tinggi');
            $table->string('program_studi');
            $table->string('jenjang'); // D3 / S1 / S2
            $table->integer('semester')->nullable();
            $table->year('tahun_masuk')->nullable();
            $table->bigInteger('nominal')->nullable();
            $table->string('status_pengajuan')->default('draft');
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kip_kuliahs');
    }
};
