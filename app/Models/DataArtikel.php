<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataArtikel extends Model
{
    protected $fillable = [
        'no',
        'waktu',
        'judul_artikel',
        'isi_artikel',
        'link_artikel',
        'gambar',
    ];

    // If you are using timestamps
    public $timestamps = true;
}
