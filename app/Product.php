<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    Use SoftDeletes;

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
