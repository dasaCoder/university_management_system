<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseSemSubscription;
use Auth;
use App\Course;
    
class LecturerController extends Controller
{
    public function index() {
        $user = Auth::user();
        $data = [];
        $data['courses'] = $user->lecEnrollments;

        return view('lecturer.dashboard', compact('data',$data));

    }

    public function courseView($subscriptionId, $courseId) {
        $data = [];
        $user = Auth::user();

        $data['subscription'] = CourseSemSubscription::findOrFail($subscriptionId);
        $data['course'] = Course::findOrFail($courseId);
        //$data['enrolledSubscriptionList'] = CourseSemSubscription::where('ac_year',$user->acc_year)->get();

        return view('lecturer.course',compact('data',$data));
    }
}
