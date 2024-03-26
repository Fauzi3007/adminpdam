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
            $table->increments('id_cuti');
            $table->unsignedInteger('id_pegawai')->constrained(
                table: 'pegawais', column:'id_pegawai',indexName: 'pegawaiCutiForeign'
            );
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('keterangan', 50);
            $table->string('status', 10);
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
