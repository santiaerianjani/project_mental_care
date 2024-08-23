<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganTes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'waktu',
        'keterangan',
        'total',
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
