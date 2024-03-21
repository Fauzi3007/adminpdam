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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama_lengkap', 50);
            $table->char('jenis_kelamin', 1);
            $table->date('tgl_lahir');
            $table->string('telepon', 15);
            $table->string('alamat', 300);
            $table->string('status_nikah', 20);
            $table->integer('jumlah_anak');
            $table->foreignId('kantor_cabang')->constrained(
                table: 'cabangs', column:'id_cabang',indexName: 'cabangForeign'
            );
            $table->foreignId('jabatan')->constrained(
                table: 'jabatans',column:'id_jabatan' ,indexName: 'jabatanForeign'
            );
            $table->integer('gaji');
            $table->string('foto', 2048);
            $table->foreignId('id_user')->constrained(
                table: 'users', indexName: 'userForeign'
            );
            $table->timestamps();

           

         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
