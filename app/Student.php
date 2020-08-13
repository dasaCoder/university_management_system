<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public static function getStudents() {
        $students = User::role('student')->get();
        return $students;
    }


}
