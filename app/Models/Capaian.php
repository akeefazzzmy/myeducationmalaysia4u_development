<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capaian extends Model
{
    use HasFactory;

    protected $table = 'capaian';

    public function users()
    {
        return $this->hasMany('App\Models\User', 'capaian_id', 'id');
    }
}
