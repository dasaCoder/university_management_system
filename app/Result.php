<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'student_id');
    }

    public function enrollment()
    {
        return $this->belongsTo('App\CourseSemSubscription', 'enrollment_id');
    }
}
