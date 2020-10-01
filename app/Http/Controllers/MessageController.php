<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\CourseSemSubscription;
use App\Course;
use Auth;
use App\User;

class MessageController extends Controller
{
    function create(Request $request) {

        $user = User::findOrFail($request->post('user_id'));
        $intent = $request->post('intent');

        switch($intent) {
            case 'ENROLL_COURSE':
                return $this->enrollForCourse($user, $request->post("course_id"));
                break;
            default:
                return 'No Valid Response';

        }

        
    }

    public function enrollForCourse($user, $courseId) {
        $course = Course::where('courseId', $courseId)->get();

        if(!isset($course[0])) {
            return array("result"=>"Invalid course Id");
        }

        $courseSemSubscription = CourseSemSubscription::where('ac_year',$user->acc_year)
                    ->where('course_id',$course[0]->id)
                    ->first();

        if(!isset($courseSemSubscription)) {
            return array("result"=>"No subscription available");
        }

        $user->enrollments()->save($courseSemSubscription);

        return array("result"=>"Enrolled Successfully!");
    }
}
