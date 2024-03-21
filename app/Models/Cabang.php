<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabang';

    protected $primaryKey = 'id_cabang';

    protected $fillable = [
        'nama_cabang',
        'kepala_cabang',
        'latitude_cabang',
        'longitude_cabang',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'kantor_cabang');
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'lingkup_cabang');
    }
}
