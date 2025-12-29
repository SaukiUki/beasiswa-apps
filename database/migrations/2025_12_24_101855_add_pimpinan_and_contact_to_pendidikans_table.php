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
        Schema::table('pendidikans', function (Blueprint $table) {
            $table->string('nama_pimpinan')->nullable()->after('nama_instansi');
            $table->string('no_hp_pimpinan')->nullable()->after('nama_pimpinan');
            $table->string('email_instansi')->nullable()->after('no_hp_pimpinan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendidikans', function (Blueprint $table) {
            $table->dropColumn([
                'nama_pimpinan',
                'no_hp_pimpinan',
                'email_instansi',
            ]);
        });
    }
};
