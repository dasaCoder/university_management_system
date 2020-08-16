<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseSemSubscription;
use App\Result;
use Auth;

class ResultController extends Controller
{
    public function get(Request $request){
        $user = Auth::user();
        $data = [];
        $data['subscriptions'] = CourseSemSubscription::all();

        $sub_id = $request->post('subscription_id');
        $data['selected_subscription'] = CourseSemSubscription::find($sub_id);

        return view('admin.results',compact('data',$data));
    }

    // public function singleResult(Request $request) {
    //     $subscription = CourseSemSubscription::findOrFail($request->post('subscriptionId'));
    //     $result = new Result();
    //     $result->user_id = Auth::user()->id;
    //     $result->grade = $request->post('grade');

    //     $subscription->enrollment($result);
    // }

    public function stdProfile() {
        $user = Auth::user();
        $data = [];

        return view('student.result',compact('data',$data));
    }

    public function create(Request $request){
        $user = Auth::user();
        $subscription = CourseSemSubscription::findOrFail($request->post('subscriptionId'));

        $index = 0;
        
        foreach($subscription->students as $std) {
            $rst = new Result();
            
            $rst->grade = $request->post("results")[$index];
            $rst->enrollment_id = $request->post("subscriptionId");
            $rst->more_info = "{}";
            $std->results()->save($rst);
            $index++;
        }

        
        return view('admin.results');
    }
}
