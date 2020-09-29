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
use App\CurrentSemester;

class AdminController extends Controller
{
    public function index(){
        $degrees = Degree::all();
        $courses = Course::all();
        $students = User::role('student')->get();
        $lec_sessions = LectureSession::whereDate('start_time', Carbon::today(+5.30))->get();
        $current_sem = $this->getCurrentSem();
        //dd($lec_sessions);

        return view('admin.dashboard')
            ->with('degrees',$degrees)
            ->with('courses',$courses)
            ->with('students',$students)
            ->with('lec_sessions',$lec_sessions)
            ->with('current_sem',$current_sem);
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

    public function changeSem(Request $request) {

        $all_semesters = CurrentSemester::all();
        foreach($all_semesters as $semester) {
            $semester->ended_at = Carbon::now();
            $semester->timestamps = false;
            $semester->save();
        }

        $sem = new CurrentSemester();
        $sem->academic_year = $request->post('ac_year');
        $sem->semester = $request->post('semester');
        $sem->sem_str = $request->post('ac_year'). ' '. $request->post('semester');
        $sem->started_at = Carbon::now();
        $sem->timestamps = false;
        $sem->is_current = true;
        $sem->save();

        return $this->index();
    }

}
