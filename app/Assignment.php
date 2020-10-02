<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $guarded = [];

    public function courseSubscription(){
        return $this->belongsTo('App\CourseSemSubscription','subscription_id');
    }
}
