<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'agama';

    public function profil_pelajar()
    {
        return $this->hasMany('App\Models\ProfilPelajar', 'agama_id', 'id'); //nak connect dgn model apa, id model sana, id model sini
    }
}
