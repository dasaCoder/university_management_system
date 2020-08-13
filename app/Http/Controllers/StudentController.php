<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\User;

class StudentController extends Controller
{
    public function index() {
        return view("student.dashboard");
    }

    public function home(){
        $students = Student::getStudents();
        
        return view('student.dashboard', compact('students',$students));
    }


}
