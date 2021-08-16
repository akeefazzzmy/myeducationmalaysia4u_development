<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class User extends Model
class User extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    //baru tambah 5/5/2021
    protected $table = 'users';
    protected $fillable = ['no_kp', 'name', 'email', 'no_tel', 'password', 'capaian_id', 'status_users_id'];
    //baru tambah 5/5/2021 end

    public function capaian()
    {
        return $this->belongsTo('App\Models\Capaian', 'capaian_id', 'id');
    }

    public function status_users()
    {
        return $this->belongsTo('App\Models\StatusUsers', 'status_users_id', 'id');        
    }

    public function em()
    {
        return $this->belongsTo('App\Models\Em', 'em_id', 'id');           
    }

    public function negara()
    {
        return $this->belongsTo('App\Models\Negara', 'negara_id', 'id');           
    }

    public function profil_pelajar()
    {
        return $this->hasOne('App\Models\ProfilPelajar', 'users_id', 'id');
    }

    public function vaksinasi_pelajar()
    {
        return $this->hasMany('App\Models\VaksinasiPelajar', 'users_id', 'id');
    }

    // public function liputan_em()
    // {
    //     return $this->hasMany('App\Models\LiputanEm', 'id', 'em_id');
    // }
}
