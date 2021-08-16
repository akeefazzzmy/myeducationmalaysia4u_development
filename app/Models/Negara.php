<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    use HasFactory;

    protected $table = 'negara';
    protected $fillable = [
        'kod_negara',
        'keterangan',
        'no_kp_wujud',
        'no_kp_kemaskini',
    ]; 
    
    public function state()
    {
        return $this->hasMany('App\Models\States', 'kod_negara', 'kod_negara');
    }

    // public function alamat_penginapan_pengajian()
    // {
    //     return $this->hasMany('App\Models\AlamatPenginapanPengajian', 'institusi_id', 'id');
    // }

    // public function liputan_em()
    // {
    //     return $this->belongsTo('App\Models\LiputanEm', 'id', 'liputan_em_id');
    // }

    public function liputan_em()
    {
        return $this->hasMany('App\Models\LiputanEm', 'kod_negara', 'kod_negara');
    }

    public function pengajian_pelajar()
    {
        return $this->hasMany('App\Models\PengajianPelajar', 'kod_negara', 'kod_negara');
    }
}