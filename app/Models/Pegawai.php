<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tgl_lahir',
        'telepon',
        'email',
        'alamat',
        'status_nikah',
        'jumlah_anak',
        'kantor_cabang',
        'jabatan',
        'gaji',
        'foto',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kantorCabang()
    {
        return $this->belongsTo(Cabang::class, 'kantor_cabang');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan');
    }

    public function gaji()
    {
        return $this->belongsTo(Gaji::class, 'gaji');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_pegawai');
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'id_pegawai');
    }

    public function pencatatan()
    {
        return $this->hasMany(Pencatatan::class, 'id_pegawai');
    }
}
