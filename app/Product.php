<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    Use SoftDeletes;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
    public function deletedBy()
    {
        return $this->belongsTo('App\User', 'deleted_by');
    }
}
