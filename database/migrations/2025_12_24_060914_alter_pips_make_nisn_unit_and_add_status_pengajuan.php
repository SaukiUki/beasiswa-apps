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
    Schema::table('p_i_p_s', function (Blueprint $table) {

        // 1. Jadikan NISN WAJIB
        $table->string('nisn')->nullable(false)->change();

        // 2. Jadikan NISN UNIK (UNIT)
        $table->unique('nisn');

        // 3. Tambah kolom status_pengajuan
        $table->string('status_pengajuan')
            ->default('draft')
            ->after('status');
    });
}

public function down(): void
{
    Schema::table('p_i_p_s', function (Blueprint $table) {
        $table->dropUnique(['nisn']);
        $table->dropColumn('status_pengajuan');
        $table->string('nisn')->nullable()->change();
    });
}
};
