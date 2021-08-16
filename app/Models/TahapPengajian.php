<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapPengajian extends Model
{
    use HasFactory;

    protected $table = 'tahap_pengajian';

    // public function program_pengajian()
    // {
    //     return $this->hasMany('App\Models\ProgramPengajian', 'tahap_pengajian_id', 'id');
    // }

    //after removing prog pengajian then link with
    public function pengajian_pelajar()
    {
        return $this->hasMany('App\Models\PengajianPelajar', 'tahap_pengajian_id', 'id');
    }
}
