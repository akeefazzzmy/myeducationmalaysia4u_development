<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penaja extends Model
{
    use HasFactory;

    protected $table = 'penaja';
    
    public function penaja_pengajian()
    {
        return $this->hasMany('App\Models\PenajaPengajian', 'penaja_id', 'id');
    }
}
