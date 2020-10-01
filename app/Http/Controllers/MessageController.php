<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\CourseSemSubscription;
use App\Course;
use Auth;
use App\User;
use App\Result;

class MessageController extends Controller
{
    function create(Request $request)
    {

        $user = User::findOrFail($request->post('user_id'));
        $intent = $request->post('intent');

        switch ($intent) {
            case 'ENROLL_COURSE':
                return $this->enrollForCourse($user, $request->post("courseId"));
            case 'GET_RESULT':
                return $this->getResult($user,$request->post("courseId"));
            default:
                return 'No Valid Response';
        }
    }

    public function enrollForCourse($user, $courseId)
    {
        $course = Course::where('courseId', $courseId)->get();

        if (!isset($course[0])) {
            return array("result" => "Invalid course Id");
        }

        $courseSemSubscription = CourseSemSubscription::where('ac_year', $user->acc_year)
            ->where('course_id', $course[0]->id)
            ->first();

        if (!isset($courseSemSubscription)) {
            return array("result" => "No subscription available");
        }

        $user->enrollments()->save($courseSemSubscription);

        return array("result" => "Enrolled Successfully!");
    }

    public function getResult($user, $courseId)
    {
        $course = Course::where('courseId', $courseId)->first();

        if (!isset($course)) {
            return array("result" => "Invalid course Id");
        }

        $courseSemSubscription = CourseSemSubscription::where('ac_year', $user->acc_year)
            ->where('course_id', $course->id)
            ->first();

        if (!isset($courseSemSubscription)) {
            return array("result" => "No subscription available");
        }

        $result = Result::where('enrollment_id',$courseSemSubscription->id)
            ->where('user_id',$user->id)->first();

        if(!isset($result)){
            return array("result" => "Result is not available yet. Contact administration unit");
        }
        
        return array("result"=>"Result for ".$course->courseId. " is ".$result->grade);
    }
}
