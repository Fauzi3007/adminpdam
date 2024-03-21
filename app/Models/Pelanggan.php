<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'nomor_pelanggan',
        'nama_pelanggan',
        'alamat',
        'latitude',
        'longitude',
        'lingkup_cabang',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'lingkup_cabang');
    }

    public function pencatatan()
    {
        return $this->hasMany(Pencatatan::class, 'id_pelanggan');
    }
}
