<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPengajian extends Model
{
    use HasFactory;

    protected $table = 'program_pengajian';

    // public function pengajian_pelajar()
    // {
    //     return $this->hasMany('App\Models\PengajianPelajar', 'program_pengajian_id', 'id');
    // }

    //plan nya nak pakai ini link with id
    // public function bidang()
    // {
    //     return $this->belongsTo('App\Models\Bidang', 'bidang_id', 'id');   
    // }
    //tapi ubah ke ini kejap
    public function bidang()
    {
        return $this->belongsTo('App\Models\Bidang', 'kod_bidang', 'kod_bidang');   
    }

}
