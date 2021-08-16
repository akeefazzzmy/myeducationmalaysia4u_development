<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//model, fk dalam table liputanem, id kat luar table liputanem

class LiputanEm extends Model
{
    use HasFactory;

    protected $table = 'liputan_em';

    //asalnya nak pakai ni start
    // public function negara()
    // {
    //     return $this->belongsTo('App\Models\Negara', 'negara_id', 'id');
    // }
    //asalnya nak pakai ni end
    //tapi ke ini start
    public function negara()
    {
        return $this->belongsTo('App\Models\Negara', 'kod_negara', 'kod_negara');
    }
    //tapi ubah ke ini end

    // public function negara()
    // {
    //     return $this->hasMany('App\Models\Negara', 'id', 'negara_id');
    // }

    //asalnya nak pakai ni start
    // public function em()
    // {
    //     return $this->belongsTo('App\Models\Em', 'em_id', 'id');
    // }
    //asalnya nak pakai ni end
    //tapi ke ini start
    public function em()
    {
        return $this->belongsTo('App\Models\Em', 'kod_em', 'kod_em');
    }
    //tapi ubah ke ini end

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'em_id', 'id');
    // }

    // public function states()
    // {
    //     return $this->hasMany('App\Models\Negara', 'negara_id', 'negara_id');
    // }

    public function pengajian_pelajar()
    {
        return $this->hasMany('App\Models\PengajianPelajar', 'kod_negara', 'kod_negara');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\States', 'kod_states', 'kod_states');
    }
}
