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
            $table->id('id_gaji');
            $table->decimal('gaji_pokok', 5, 2);
            $table->decimal('tunjangan_jabatan', 5, 2);
            $table->decimal('tunjangan_anak', 5, 2);
            $table->decimal('tunjangan_nikah', 5, 2);
            $table->decimal('potongan', 5, 2);
            $table->decimal('pajak', 5, 2);
            $table->decimal('total_gaji', 5, 2);
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
