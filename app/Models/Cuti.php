<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cutis';

    protected $primaryKey = 'id_cuti';

    protected $fillable = [
        'id_pegawai',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
        'status',
        'bukti_foto'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
