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

    // get results for given student
    public function stdProfile(Request $request) {
        $user = Auth::user();
        $data = [];

        $selected_ac_year = $request->input('ac_year');
        $selected_semester = $request->get('semester');

        if($selected_ac_year != null || $selected_semester != null ){

            $data['selected_results'] = $user->results()
                                                    ->whereHas('enrollment',function($query) use($selected_ac_year) {
                                                        if($selected_ac_year != null) {
                                                            $query
                                                                ->select('*')
                                                                ->where('ac_year', $selected_ac_year);
                                                        }
                                                    })
                                                    ->whereHas('enrollment',function($query) use($selected_semester) {
                                                        if($selected_semester != null) {
                                                            $query
                                                                ->select('*')
                                                                ->where('semester', $selected_semester);
                                                        }
                                                    })->get();
        }
        
        
        return view('student.result',compact('data',$data))->with('selected_ac_year',$selected_ac_year)->with('selected_semester',$selected_semester);
    }

    public function create(Request $request){
        $user = Auth::user();
        $subscription = CourseSemSubscription::findOrFail($request->post('subscriptionId'));

        $index = 0;
        
        $subscription->results()->delete();

        foreach($subscription->students as $std) {
            $rst = new Result();
            
            $rst->grade = $request->post("results")[$index];
            $rst->enrollment_id = $request->post("subscriptionId");
            $rst->more_info = "{}";
            $std->results()->save($rst);
            $index++;
        }

        
        return array("success"=>true, "data" => $subscription);
    }
}
