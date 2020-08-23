<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['msg','owner_id','sender_type'];

    public function owner() {
        return $this->belongsTo('App\User','owner_id');
    }
}
