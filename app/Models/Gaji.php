<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gajis';

    protected $primaryKey = 'id_gaji';

    protected $fillable = [
        'id_pegawai',
        'gaji_pokok',
        'tunjangan_jabatan',
        'tunjangan_anak',
        'tunjangan_nikah',
        'potongan',
        'pajak',
        'total_gaji',
        'tanggal',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
