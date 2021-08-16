<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahStatusPengajian extends Model
{
    use HasFactory;

    protected $table = 'sejarah_status_pengajian';
    protected $fillable = ['pengajian_pelajar_id'];

    public function status_pengajian()
    {
        return $this->belongsTo('App\Models\StatusPengajian', 'id', 'status_pengajian_id');   
    }

    public function pengajian_pelajar()
    {
        return $this->belongsTo('App\Models\PengajianPelajar', 'id', 'pengajian_pelajar_id');        
    }
}
