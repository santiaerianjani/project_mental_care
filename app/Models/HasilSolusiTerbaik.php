<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSolusiTerbaik extends Model
{
    protected $fillable = [
        'user_id','datasolusiterbaik_id','waktu','hasil_diagnosa','solusi_terbaik',
    ];
    public function hasilsolusiterbaik() {
        return $this->belongsTo('App\Models\HasilSolusiTerbaik');
    }
    // public function tes() {
    //     return $this->belongsTo('App\Models\TesKesehatanMental');
    // }
    public function datasolusiterbaik() {
        return $this->belongsTo('App\Models\DataSolusiTerbaik');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
