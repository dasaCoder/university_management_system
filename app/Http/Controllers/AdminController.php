<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function students(){
        $students = Student::getStudents();
        
        return view('admin.students', compact('students',$students));
    }
}
