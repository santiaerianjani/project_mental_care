<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'role',
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function datarekammedis() {
        return $this->belongsTo('App\Models\DataRekamMedis');
    }
}
