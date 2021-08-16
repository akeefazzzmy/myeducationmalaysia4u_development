<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangsa extends Model
{
    use HasFactory;

    protected $table = 'bangsa';

    public function profil_pelajar()
    {
        return $this->hasMany('App\Models\ProfilPelajar', 'bangsa_id', 'id');
    }
}
