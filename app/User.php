<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function degree()
    {
        return $this->belongsTo('App\Degree');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'user_courses', 'user_id', 'course_id');
    }

    // get students enrollments
    public function enrollments()
    {
        return $this->belongsToMany('App\CourseSemSubscription', 'subscription_std_table', 'student_id', 'subscription_id');
    }

    //get lecturer enrollments
    public function lecEnrollments()
    {
        return $this->hasMany('App\CourseSemSubscription','lecturer_id');
    }

    public function results(){
        return $this->hasMany('App\Result');
    }

    public function payments(){
        return $this->hasMany('App\StudentPayment');
    }

    public function paymentsForCurrentSem() {
        return $this->whereHas('payments',function($query){$query->where('semester','2019/2020 Semester I');})->get();
    }

    //dd($this->payments());
    
}
