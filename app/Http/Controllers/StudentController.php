<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\User;
use App\CourseSemSubscription;
use Auth;
use App\Course;

class StudentController extends Controller
{
    public function index() {
        $data = [];
        $data['students'] = Student::getStudents();
        $user = Auth::user();
        $data['courses'] = CourseSemSubscription::where('ac_year',$user->acc_year)->get();

        return view('student.dashboard', compact('data',$data)); 
    }

    public function courseView($subscriptionId, $courseId) {
        $data = [];
        $user = Auth::user();

        $data['subscription'] = CourseSemSubscription::findOrFail($subscriptionId);
        $data['course'] = Course::findOrFail($courseId);
        //$data['enrolledSubscriptionList'] = CourseSemSubscription::where('ac_year',$user->acc_year)->get();

        return view('student.course',compact('data',$data));
    }

    // public function home(){
    //     $students = Student::getStudents();
    //     $user = Auth::user();
    //     dd($user->accyear);
    //     $courses = CourseSemSubscription::where()->get();

    //     return view('student.dashboard', compact('students',$students));
    // }


}
