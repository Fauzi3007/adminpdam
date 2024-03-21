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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id('id_cuti');
            $table->foreignId('id_pegawai')->constrained(
                table: 'pegawais', column:'id_pegawai',indexName: 'pegawaiCutiForeign'
            );
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('keterangan', 30);
            $table->string('status', 30);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
