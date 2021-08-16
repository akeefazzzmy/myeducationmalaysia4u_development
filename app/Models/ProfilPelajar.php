<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPelajar extends Model
{
    use HasFactory;

    protected $table = 'profil_pelajar';
    protected $fillable = ['users_id'];

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }

    public function agama()
    {
        return $this->belongsTo('App\Models\Agama', 'agama_id', 'id'); //betul
    }

    public function bangsa()
    {
        return $this->belongsTo('App\Models\Bangsa', 'bangsa_id', 'id');       
    }

    public function jantina()
    {
        return $this->belongsTo('App\Models\Jantina', 'jantina_id', 'id');
    }

    public function negeriLahir()
    {
        return $this->belongsTo('App\Models\Negeri', 'negeri_lahir', 'id');
    }
    public function negeriAlamat()
    {
        return $this->belongsTo('App\Models\Negeri', 'negeri_alamat', 'id');
    }

    // public function waris()
    // {
    //     return $this->hasMany('App\Models\ProfilPelajar', 'id', 'profil_pelajar_id');
    // }

    public function waris()
    {
        return $this->hasMany('App\Models\Waris', 'profil_pelajar_id', 'id');
    }

    public function pengajian_pelajar()
    {
        return $this->hasMany('App\Models\PengajianPelajar', 'profil_pelajar_id', 'id');
    }
}
