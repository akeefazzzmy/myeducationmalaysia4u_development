<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisVaksin extends Model
{
    use HasFactory;

    protected $table = 'jenis_vaksin';

    public function vaksinasi_pelajar()
    {
        return $this->hasMany('App\Models\VaksinasiPelajar', 'jenis_vaksin_id', 'id');
    }
}
