<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRekamMedis extends Model
{
    protected $fillable = [
        'no','name','waktu','hasil_diagnosa','solusi_terbaik', 'awal', 'kategori_depresi','akhir',
    ];

    public function datarekammedis() {
        return $this->belongsTo('App\Models\DataRekamMedis');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function hasilsolusiterbaik() {
        return $this->belongsTo('App\Models\HasilSolusiTerbaik');
    }
}
