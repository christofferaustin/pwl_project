<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
       protected $table = 'table_dosen';

       protected $fillable = [
              'user_id',
              'Fullname',
              'NIP',
              'NIDN',
              'Pendidikan_Terakhir',
              'Jurusan_id',
              'Tempat_Lahir',
              'Tanggal_Lahir',
              'Alamat'
       ];

       public function user()
       {
              return $this->belongsTo(User::class, 'user_id');
       }

       public function jurusan()
       {
              return $this->belongsTo(Jurusan::class, 'Jurusan_id');
       }

       public function kelas()
       {
              return $this->hasMany(Kelas::class, 'kode_dosen', 'id');
       }

       public function mataKuliah()
       {
              return $this->hasMany(MataKuliah::class, 'Dosen_Id', 'id');
       }
}