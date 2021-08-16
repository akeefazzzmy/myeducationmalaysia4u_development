<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinasiPelajar extends Model
{
    use HasFactory;

    protected $table = 'vaksinasi_pelajar';

    // public function users()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'users_id');
    // }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'id', 'users_id');
    }

    // public function status_vaksinasi()
    // {
    //     return $this->hasMany('App\Models\StatusVaksinasi', 'status_vaksinasi_id', 'id');
    // }

    public function status_vaksinasi()
    {
        return $this->belongsTo('App\Models\StatusVaksinasi', 'status_vaksinasi_id', 'id');
    }

    public function jenis_vaksin()
    {
        return $this->belongsTo('App\Models\JenisVaksin', 'jenis_vaksin_id', 'id');
    }
}
