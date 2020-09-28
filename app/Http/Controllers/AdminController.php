<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\User;
use App\Course;
use App\Degree;
use App\LectureSession;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        $degrees = Degree::all();
        $courses = Course::all();
        $students = User::role('student')->get();
        $lec_sessions = LectureSession::whereDate('start_time', Carbon::today(+5.30))->get();
        //dd($lec_sessions);

        return view('admin.dashboard')->with('degrees',$degrees)->with('courses',$courses)->with('students',$students)->with('lec_sessions',$lec_sessions);
    }

    public function students(){
        $data = [];
        $data['students'] = Student::getStudents();
        $data['degrees'] = Degree::all();

        return view('admin.students', compact('data',$data));
    }

    public function createStudent(Request $request) {
        $user = new User();
        $user->password = Hash::make($request->post("password"));
        $user->email = $request->post("email");
        $user->name = $request->post("name");
        $user->acc_year = $request->post("acyear");
        $user->telephone = $request->post("telephone");
        $user->degree_id = $request->post("degree_id");
        $user->save();

        $user->idstr = $user->degree->slug."/". substr($request->post("acyear"),0,4)."/".$user->id;
        $user->save();

        $user->assignRole('student');

        return redirect()->route('admin.students');

    }

    public function courses() {
        $data = [];

        $data['degrees'] = Degree::all();
        $data['lecturers'] = User::role('lecturer')->get();
        $data['courses'] = Course::all();

        return view('admin.courses')->with('data',$data);
    }
}
