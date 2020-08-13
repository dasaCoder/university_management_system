<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degree;

class DegreeController extends Controller
{
    public function create(Request $request) {
        Degree::create($request->all());

        return redirect()->route('admin.courses');
    }
}
