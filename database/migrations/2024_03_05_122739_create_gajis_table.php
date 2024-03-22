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
        Schema::create('gajis', function (Blueprint $table) {
            $table->increments('id_gaji');
            $table->unsignedInteger('id_pegawai')->constrained(
                table: 'pegawais', column:'id_pegawai',indexName: 'GajiPegawaiForeign'
            );
            $table->decimal('gaji_pokok', 10, 2);
            $table->decimal('tunjangan_jabatan', 10, 2);
            $table->decimal('tunjangan_anak', 10, 2);
            $table->decimal('tunjangan_nikah', 10, 2);
            $table->decimal('potongan', 10, 2);
            $table->decimal('pajak', 10, 2);
            $table->decimal('total_gaji', 10, 2);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
