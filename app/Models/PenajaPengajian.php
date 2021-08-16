<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenajaPengajian extends Model
{
    use HasFactory;

    protected $table = 'penaja_pengajian';
    protected $fillable = ['pengajian_pelajar_id'];

    public function penaja()
    {
        return $this->belongsTo('App\Models\Penaja', 'penaja_id', 'id');
    }

    public function pengajian_pelajar()
    {
        return $this->belongsTo('App\Models\PengajianPelajar', 'id', 'pengajian_pelajar_id');
    }
}
