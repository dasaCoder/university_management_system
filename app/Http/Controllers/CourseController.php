<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\LectureSession;
use DateTime;
use Carbon\Carbon;


class CourseController extends Controller
{
    public function create(Request $request) {
        
        $course = Course::create($request->all());

        return redirect()->route('admin.courses');
    }

    public function shedule(Request $request) {
        $session = new LectureSession();
        $session->start_time = Carbon::createFromFormat('m/d/Y H:i', substr($request->post('start_time'), 0, -3));
        $session->end_time  = Carbon::createFromFormat('m/d/Y H:i', substr($request->post('end_time'), 0, -3));
        $session->course_id = $request->post('course_id');
        $session->lec_hall = $request->post('lec_hall');
        $session->ac_year = $request->post('ac_year');
        $session->save();

        return redirect()->route('admin');
    }
}
