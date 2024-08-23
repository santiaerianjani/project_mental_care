<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJawaban extends Model
{
    use HasFactory;
    protected $fillable = [
        'pernyataan_id','point','jawaban',
    ];
    public function pernyataan() {
        return $this->belongsTo('App\Models\DataPernyataan');
    }
}
