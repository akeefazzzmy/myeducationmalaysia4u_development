<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negeri extends Model
{
    use HasFactory;

    protected $table = 'negeri';

    public function negeri_lahir()
    {
        return $this->hasMany('App\Models\ProfilPelajar', 'negeri_lahir', 'id');
    }
    
    public function negeri_alamat()
    {
        return $this->hasMany('App\Models\ProfilPelajar', 'negeri_alamat', 'id');
    }
}
