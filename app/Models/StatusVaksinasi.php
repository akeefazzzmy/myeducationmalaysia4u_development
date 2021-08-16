<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusVaksinasi extends Model
{
    use HasFactory;

    protected $table = 'status_vaksinasi';

    // public function vaksinasi_pelajar()
    // {
    //     return $this->belongsTo('App\Models\VaksinasiPelajar', 'status_vaksinasi_id', 'id');
    // }

    // public function vaksinasi_pelajar()
    // {
    //     return $this->hasMany('App\Models\VaksinasiPelajar', 'id', 'status_vaksinasi_id');
    // }
}
