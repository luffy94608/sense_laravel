<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lock extends Model
{

    public function type()
    {
        return $this->belongsTo('App\Models\LockType','lock_type_id');
    }

    public function params()
    {
        return $this->hasMany('App\Models\LockParam','lock_id');
    }
}
