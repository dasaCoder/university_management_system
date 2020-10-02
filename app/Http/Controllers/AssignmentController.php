<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use Auth;
use App\CourseSemSubscription;
use Carbon\Carbon;

class AssignmentController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();

        $data = [];
        $data['subscriptions'] = $user->lecEnrollments;

        $sub_id = $request->get('subId');
        $data['selected_subscription'] = CourseSemSubscription::find($sub_id);

        $data['assignments'] = Assignment::whereHas('courseSubscription.lecturer', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();

        return view('lecturer.assignments',compact('data',$data));
    }

    public function createAssignment(Request $request) {
        $assignment = new Assignment();
        $assignment->title = $request->post('title');
        $assignment->description = $request->post('description');
        $assignment->subscription_id = $request->post('subscription_id');
        $assignment->due_date = Carbon::createFromFormat('m/d/Y H:i', substr($request->post('due_date'), 0, -3));
        $assignment->save();

        return $this->index($request);
    }
}
