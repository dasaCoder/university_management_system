<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\User;
use App\Course;
use App\Degree;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function students(){
        $students = Student::getStudents();
        
        return view('admin.students', compact('students',$students));
    }

    public function createStudent(Request $request) {
        $user = new User();
        $user->password = Hash::make($request->post("password"));
        $user->email = $request->post("email");
        $user->name = $request->post("name");
        $user->save();

        $user->assignRole('student');

        return $this->students();
    }

    public function courses() {
        $degrees = Degree::all();
        return view('admin.courses', compact('degrees',$degrees));
    }
}
