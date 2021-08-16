<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'bidang';

    // public function program_pengajian()
    // {
    //     return $this->hasMany('App\Models\ProgramPengajian', 'program_pengajian_id', 'id');
    // }

    // public function program_pengajian()
    // {
    //     return $this->hasMany('App\Models\ProgramPengajian', 'bidang_id', 'id');
    // }

    //after removing prog pengajian then link with
    public function pengajian_pelajar()
    {
        return $this->hasMany('App\Models\PengajianPelajar', 'bidang_id', 'id');
    }
}
