<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'nim';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nama',
        'id_jurusan',
        'alamat',
        'semester',
        'no_tlfn',
        'tgl_lahir',
        'jk',
        'email',
        'tahun_masuk',
        'status',
        'password'
    ];
}
