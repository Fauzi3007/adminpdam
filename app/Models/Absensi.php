<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $primaryKey = 'id_absensi';

    protected $fillable = [
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status',
        'keterangan',
        'id_pegawai',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
