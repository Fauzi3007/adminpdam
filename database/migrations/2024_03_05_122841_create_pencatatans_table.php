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
        Schema::create('pencatatans', function (Blueprint $table) {
            $table->id('id_pencatatan');
            $table->foreignId('id_pelanggan')->constrained(
                table: 'pelanggans', column:'id_pelanggan',indexName: 'pelangganForeign'
            );
            $table->integer('meteran_lama');
            $table->integer('meteran_baru');
            $table->date('tanggal');
            $table->string('foto_meteran', 200);
            $table->foreignId('id_pegawai')->constrained(
                table: 'pegawais', column:'id_pegawai',indexName: 'pegawaiCatatForeign'
            );

       

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatans');
    }
};
