<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUsers extends Model
{
    use HasFactory;

    protected $table = 'status_users';

    public function users()
    {
        return $this->hasMany('App\Models\User', 'status_users_id', 'id');
    }
}
