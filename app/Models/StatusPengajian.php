<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengajian extends Model
{
    use HasFactory;

    protected $table = 'status_pengajian';

    public function sejarah_status_pengajian()
    {
        return $this->hasMany('App\Models\SejarahStatusPengajian', 'status_pengajian_id', 'id');
    }
}
