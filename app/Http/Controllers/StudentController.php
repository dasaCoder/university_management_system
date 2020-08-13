<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index() {
        return view("student.dashboard");
    }

    public function home(){
        $students = Student::getStudents();
        
        return view('student.dashboard', compact('students',$students));
    }

    public function create(Request $request) {
        dd($request->post());
    }
}
