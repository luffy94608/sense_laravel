<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function contents()
    {
        return $this->hasMany('App\Models\PageContent');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\PageType','page_type_id');
    }
}
