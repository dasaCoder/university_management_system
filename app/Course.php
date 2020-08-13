<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function degree()
    {
        return $this->belongsTo('App\Degree');
    }
}
