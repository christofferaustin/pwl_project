<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'table_jurusan';

    protected $fillable = [
        'Kode_Jurusan',
        'Nama_Jurusan'
    ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class,'Jurusan_id','id');
    }

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class,'Jurusan_Id','id');
    }
}