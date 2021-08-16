<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waris extends Model
{
    use HasFactory;

    protected $table = 'waris';
    protected $fillable = ['profil_pelajar_id'];

    public function profil_pelajar()
    {
        return $this->belongsTo('App\Models\ProfilPelajar', 'profil_pelajar_id', 'id');
    }

    public function hubungan()
    {
        return $this->belongsTo('App\Models\Hubungan', 'hubungan_id', 'id');
    }
}
