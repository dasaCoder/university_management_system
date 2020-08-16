<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureSession extends Model
{
    protected $guarded = [];

    public function semSubscription()
    {
        return $this->belongsTo('App\CourseSemSubscription','course_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
}
