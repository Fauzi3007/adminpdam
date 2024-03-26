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
            $table->increments('id_pencatatan');
            $table->unsignedInteger('nomor_pelanggan')->constrained(
                table: 'pelanggans', column:'nomor_pelanggan',indexName: 'pelangganForeign'
            );
            $table->unsignedInteger('meteran_lama');
            $table->unsignedInteger('meteran_baru');
            $table->date('tanggal');
            $table->string('foto_meteran', 100);
            $table->unsignedInteger('id_pegawai')->constrained(
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
