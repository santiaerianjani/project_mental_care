<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesKesehatanMental extends Model
{
    
    protected $fillable = [
        // 'user_id','waktu','keterangan','pernyataan1','pernyataan2','pernyataan3','pernyataan4','pernyataan5','pernyataan6','pernyataan7',
        // 'pernyataan8','pernyataan9','pernyataan10','pernyataan11','pernyataan12','pernyataan13','pernyataan14',
        // 'pernyataan15','pernyataan16','pernyataan17','pernyataan18','pernyataan19','pernyataan20','pernyataan21','total',
    'user_id','jawaban_id','keterangan_id'
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function keterangan() {
        return $this->belongsTo('App\Models\KeteranganTes');
    }
    public function jawaban() {
        return $this->belongsTo('App\Models\DataJawaban');
    }
}
