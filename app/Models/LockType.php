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

    public function downloads()
    {
        return $this->hasMany('App\Models\Download','lock_type_id','id');
    }
}
