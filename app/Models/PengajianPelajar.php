<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajianPelajar extends Model
{
    use HasFactory;

    protected $table = 'pengajian_pelajar';
    protected $fillable = ['profil_pelajar_id'];

    public function profil_pelajar()
    {
        return $this->belongsTo('App\Models\ProfilPelajar', 'profil_pelajar_id', 'id');
    }    
    public function alamat_penginapan_pengajian()
    {
        return $this->hasMany('App\Models\AlamatPenginapanPengajian', 'pengajian_pelajar_id', 'id');
    }
    public function penaja_pengajian()
    {
        return $this->hasMany('App\Models\PenajaPengajian', 'pengajian_pelajar_id', 'id');
    }
    public function sejarah_status_pengajian()
    {
        return $this->hasMany('App\Models\SejarahStatusPengajian', 'pengajian_pelajar_id', 'id');
    }
    public function program_pengajian()
    {
        return $this->belongsTo('App\Models\ProgramPengajian', 'program_pengajian_id', 'id');
    }
    // public function program_pengajian()
    // {
    //     return $this->hasMany('App\Models\ProgramPengajian', 'program_pengajian_id', 'id');
    // }

    //after removing prog pengajian then link with pengajianpelajar
    public function institusi()
    {
        return $this->belongsTo('App\Models\Institusi', 'institusi_id', 'id');   
    }
    public function bidang()
    {
        return $this->belongsTo('App\Models\Bidang', 'kod_bidang', 'kod_bidang');   
    }
    public function tahap_pengajian()
    {
        return $this->belongsTo('App\Models\TahapPengajian', 'tahap_pengajian_id', 'id');   
    }
    public function liputan_em()
    {
        return $this->belongsTo('App\Models\LiputanEm', 'kod_negara', 'kod_negara');   
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Institusi', 'kod_states', 'kod_states');   
    }
    public function negara()
    {
        return $this->belongsTo('App\Models\Negara', 'kod_negara', 'kod_negara');   
    }
}
