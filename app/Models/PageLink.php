<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageLink extends Model
{
    //
    public function content()
    {
        return $this->belongsTo('App\Models\PageContent');
    }
}
