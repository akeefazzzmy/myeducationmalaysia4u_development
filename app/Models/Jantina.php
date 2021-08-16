<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jantina extends Model
{
    use HasFactory;

    protected $table = 'jantina';

    public function profil_pelajar()
    {
        return $this->hasMany('App\Models\ProfilPelajar', 'jantina_id', 'id');
    }
}
