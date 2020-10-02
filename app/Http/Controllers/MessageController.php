<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\CourseSemSubscription;
use App\Course;
use Auth;
use App\User;
use App\Result;
use Carbon\Carbon;
use Exception;
use App\LectureSession;

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

            case 'ARRANGE_LECTURE':
                $c = $request->post("courseId");
                $dt = $request->post("date");
                $st = $request->post("startTime");
                $et = $request->post("endTime");
                $acYr = $request->post("acYear");
                $l = $request->post("lecHall");
                return $this->arrangeLecture($user,$c,$acYr,$dt,$st,$et,$l);

            case 'TODAY_LECTURES':
                return $this->getTodayLectures($user);

            case 'UPDATE_PAYMENT_DETAIL':
                return $this->updatePaymentDetails($user,$request->post('studentId'));
            
            case 'UNPAID_LIST':
                return $this->getUnpaidList($user,$request->post('acYear'));

            case 'ADD_ASSIGNMENT':
                return $this->addAssignment($user,$request->post("courseId"),$request->post("acYear"));

            default:
                return 'No Valid Response';
        }
    }

    public function getUnpaidList($user,$acYear){
        $base_url=url('/financer/details');
        return array('result'=> 'Please go to the following link <a href="'.$base_url.'?ac_year='.$acYear.'">here</a>');
    }

    public function updatePaymentDetails($user,$stdStrId){

        $payedStd = User::where('idStr',$stdStrId)->first();

        if(!isset($payedStd)){
            return array("result" => "Invalid student Id");
        }

        $base_url = url('/financer');
        return array('result'=> 'Please go to the following link <a href="'.$base_url.'?studentId='.$stdStrId.'">here</a>');

    }

    public function getTodayLectures($user) {
        $base_url = url('/shedule/today');
        return array('result'=> 'Please go to the following link <a href="'.$base_url.'">here</a>');
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

    public function addAssignment($user,$courseId,$acYear){
        $course = Course::where('courseId', $courseId)->first();

        if (!isset($course)) {
            return array("result" => "Invalid course Id");
        }

        $courseSemSubscription = $user->lecEnrollments()->where('ac_year', $acYear)
            ->where('course_id', $course->id)
            ->first();

        if (!isset($courseSemSubscription)) {
            return array("result" => "No subscriptions available");
        }

        $base_url = url('/lecturer/assignments');

        return array('result'=> 'Please go to the following link <a href="'.$base_url.'?subId='.$courseSemSubscription->id.'">here</a>');

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

    public function arrangeLecture($user,$courseId,$acYr,$date,$startTime,$endTime,$lecHall){
        
        $course = Course::where('courseId', $courseId)->first();

        if (!isset($course)) {
            return array("result" => "Invalid course Id");
        }

        $courseSemSubscription = CourseSemSubscription::where('ac_year', $acYr)
            ->where('course_id', $course->id)
            ->first();

        if (!isset($courseSemSubscription)) {
            return array("result" => "No subscription available");
        }

        try{
            $startT = Carbon::createFromFormat('Y/m/d H:i',$date.' '.$startTime);
            $endT = Carbon::createFromFormat('Y/m/d H:i',$date.' '.$endTime);
        } catch(Exception $e){
            return array("result" => "Wrong date/time format");
        }

        try{
            $session = new LectureSession();
            $session->start_time = $startT;
            $session->end_time  = $endT;
            $session->course_id = $courseSemSubscription->id;
            $session->lec_hall = $lecHall;
            $session->ac_year = $acYr;
            $session->save();
        }catch(Exception $e){
            return array("result" => "Error occured!");
        }

        return array("result" => "Sheduled Successfully");

    }
}
