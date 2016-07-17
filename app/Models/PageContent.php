<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    public function links()
    {
        return $this->hasMany('App\Models\PageLink');
    }

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }
}
