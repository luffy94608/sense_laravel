<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LockType extends Model
{
    //
    public function locks()
    {
        return $this->hasMany('App\Models\Lock','lock_type_id');
    }
}
