<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'table_mahasiswa';

    protected $fillable = [
        'user_id',
        'Fullname',
        'NIM',
        'Tempat_Lahir',
        'Tanggal_Lahir',
        'Alamat'
    ];

    public function krs()
    {
        return $this->hasMany(KRS::class,'kode_mahasiswa','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}