<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencatatan extends Model
{
    use HasFactory;

    protected $table = 'pencatatans';
    protected $primaryKey = 'id_pencatatan';


    protected $fillable = [
        'id_pelanggan',
        'meteran_lama',
        'meteran_baru',
        'tanggal',
        'foto_meteran',
        'id_pegawai',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
