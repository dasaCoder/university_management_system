<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $guarded = [];

    public function courses() {
        return $this->hasMany('App\Course');
    }
}
