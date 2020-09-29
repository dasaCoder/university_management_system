<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    protected $guarded = [];

    public function student(){
        return $this->belongsTo('App/User','user_id');
    }
}
