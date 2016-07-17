<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cloud extends Model
{
    //
    public function params()
    {
        return $this->hasMany('App\Models\CloudParam','cloud_id');
    }
}
