<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class KRSDetail extends Model
{
    protected $table = 'table_krs_detail';

    protected $fillable = [
        'krs_id',
        'kelas_id',
        'status'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function krs()
    {
        return $this->belongsTo(KRS::class,'krs_id');
    }
}