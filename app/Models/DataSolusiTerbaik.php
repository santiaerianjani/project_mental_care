<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSolusiTerbaik extends Model
{
    use HasFactory; // Menggunakan HasFactory trait

    protected $fillable = [
        'awal', 'kategori_depresi', 'solusi_terbaik','akhir',
    ];

    public function hasil()
    {
        return $this->belongsTo(HasilSolusiTerbaik::class);
    }
}
