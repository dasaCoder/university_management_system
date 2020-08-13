<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function create(Request $request) {
        
        $course = Course::create($request->all());

        return redirect()->route('admin.courses');
    }
}
