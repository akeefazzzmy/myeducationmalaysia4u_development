<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Em extends Model
{
    use HasFactory;

    protected $table = 'em';
    protected $fillable = [
        'kod_em',
        'keterangan',
    ]; 

    // public function users()
    // {
    //     return $this->hasMany('App\Models\User', 'em_id', 'id');
    // }

    //asalnya yg ini pakai id
    // public function liputan_em()
    // {
    //     return $this->hasMany('App\Models\LiputanEm', 'em_id', 'id');
    // }
    //asalnya end

    public function negara()
    {
        return $this->hasOne('App\Models\Negara', 'kod_negara', 'kod_negara_em');
    }

    public function liputan_em()
    {
        return $this->hasMany('App\Models\LiputanEm', 'kod_em', 'kod_em');
    }
}