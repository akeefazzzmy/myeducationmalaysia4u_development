<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubungan extends Model
{
    use HasFactory;

    protected $table = 'hubungan';

    public function waris()
    {
        return $this->hasMany('App\Models\Waris', 'hubungan_id', 'id');
    }
}
