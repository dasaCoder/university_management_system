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

    public function students()
    {
        return $this->belongsToMany('App\User', 'user_courses', 'course_id', 'user_id');
    }

    public function lecturer() {
        return $this->belongsTo('App\User','lecturer_id');
    }
}
