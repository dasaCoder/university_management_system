<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSemSubscription extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany('App\User', 'subscription_std_table', 'subscription_id', 'student_id');
    }

    public function lecturer()
    {
        return $this->belongsTo('App\User', 'lecturer_id', );
    }

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function results()
    {
        return $this->hasMany('App\Result','enrollment_id');
    }
}
