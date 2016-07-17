<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    //
    public function type()
    {
        return $this->belongsTo('App\Models\LockType','lock_type_id');
    }

}
