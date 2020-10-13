<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function childern()
    {
        return $this->hasMany(self::class, 'parent_id');
        
    }
}
