<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPenginapanPengajian extends Model
{
    use HasFactory;

    protected $table = 'alamat_penginapan_pengajian';
    protected $fillable = ['pengajian_pelajar_id'];

    public function pengajian_pelajar()
    {
        return $this->belongsTo('App\Models\PengajianPelajar', 'id', 'pengajian_pelajar_id');
    }

    // public function negara()
    // {
    //     return $this->belongsTo('App\Models\Negara', 'negara_id', 'id');
    // }

    public function negara()
    {
        return $this->belongsTo('App\Models\Negara', 'kod_negara', 'kod_negara');
    }

    public function states()
    {
        return $this->belongsTo('App\Models\States', 'states_id', 'id');
    }
}
