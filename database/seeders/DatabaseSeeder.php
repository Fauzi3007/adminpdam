<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@gmail.com',
        ]);

        Pegawai::create([
            'id_user' => 1,
            'nama_lengkap' => 'Admin',
            'jenis_kelamin' => 'Laki-laki',
            'tgl_lahir' => '1990-01-01',
            'telepon' => '08123456789',
            'alamat' => 'Jl. Jendral Sudirman No. 1',
            'status_nikah' => 'Belum Menikah',
            'jumlah_anak' => 0,
            'gaji_pokok' => 10000000,
            'kantor_cabang' => 1,
            'jabatan' => 1,
            'foto' => 'admin.jpg',
        ]);

    }
}
