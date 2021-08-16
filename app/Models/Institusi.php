<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    use HasFactory;

    protected $table = 'institusi';

    //asalnya nk link by id mcm ni start
    // public function states()
    // {
    //     return $this->belongsTo('App\Models\States', 'states_id', 'id');
    // }
    //asalnya nk link by id mcm ni end
    //tp pakai yg ni buat sementara start
    public function states()
    {
        return $this->belongsTo('App\Models\States', 'kod_states', 'kod_states');
    }
    //end

    //after removing prog pengajian then link with
    public function pengajian_pelajar()
    {
        return $this->hasMany('App\Models\PengajianPelajar', 'institusi_id', 'id');
    }
}
