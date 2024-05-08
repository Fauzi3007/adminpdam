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
        Schema::create('absensis', function (Blueprint $table) {
            $table->increments('id_absensi');
            $table->date('tanggal');
            $table->timestamp('waktu_masuk');
            $table->timestamp('waktu_keluar')->nullable();
            $table->string('status', 20);
            $table->enum('keterangan', ['Masuk', 'Izin', 'Sakit', 'Cuti']);
            $table->unsignedInteger('id_pegawai')->constrained(
                table: 'pegawais', column:'id_pegawai',indexName: 'pegawaiForeign'
            );
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
