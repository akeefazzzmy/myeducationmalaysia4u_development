<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    protected $table = 'states';
    protected $fillable = [
        'kod_states',
        'keterangan',
        'no_kp_wujud',
        'no_kp_kemaskini',
        'negara_id',
    ]; 

    //plan nya nak pakai ini link with id
    // public function negara()
    // {
    //     return $this->belongsTo('App\Models\Negara', 'negara_id', 'id');
    // }
    //tapi pakai yg ni untuk sementara
    public function negara()
    {
        return $this->belongsTo('App\Models\Negara', 'kod_negara', 'kod_negara');
    }
    //end

    public function alamat_penginapan_pengajian()
    {
        return $this->hasMany('App\Models\AlamatPenginapanPengajian', 'states_id', 'id');
    }

    //asalnya nk link by id mcm ni start
    // public function institusi()
    // {
    //     return $this->hasMany('App\Models\Institusi', 'states_id', 'id');
    // }
    //asalnya nk link by id mcm ni end
    //tp pakai yg ni buat sementara start
    public function institusi()
    {
        return $this->hasMany('App\Models\Institusi', 'kod_states', 'kod_states');
    }
    //end

    // public function liputan_em()
    // {
    //     return $this->belongsTo('App\Models\LiputanEm', 'liputanEm_id', 'id');
    // }
}
