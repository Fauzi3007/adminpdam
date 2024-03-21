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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->increments('id_pelanggan');
            $table->string('nomor_pelanggan', 20);
            $table->string('nama_pelanggan', 50);
            $table->string('alamat', 100);
            $table->double('latitude');
            $table->double('longitude');
            $table->unsignedInteger('lingkup_cabang')->constrained(
                table: 'cabangs', column:'id_cabang',indexName: 'cabangPelannganForeign'
            );


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
