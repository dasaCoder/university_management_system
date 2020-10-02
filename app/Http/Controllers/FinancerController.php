<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentPayment;
use App\User;
use Carbon\Carbon;
use Auth;

class FinancerController extends Controller
{
    public function index(Request $request){
        $stdId = $request->get('studentId');
        return view('financer.financer')->with('stdId',$stdId);
    }

    public function payment(Request $request){
        $user = Auth::user();

        $payedStd = User::where('idStr',$request->post('student_id'))->first();

        if(!isset($payedStd)){
            return redirect()->route('finance');
        }

        $payment = new StudentPayment();
        $payment->semester = $request->post('ac_year'). ' '. $request->post('semester');
        $payment->amount = $request->post('amount');
        $payment->payed_at = Carbon::now();
        $payment->user_id = $payedStd->id;
        $payment->save();

        $data = [];
        $data['success'] = true;

        return redirect()->route('finance');

    }

    public function paymentDetails(Request $request) {
        $ac_year = $request->get('ac_year');

        if(!isset($ac_year)){
            return view('financer.details')->with('selected_ac_year','');
        }

        $data = [];
        $selected_ac_year = $ac_year;
        $data['students'] = User::where('acc_year',$ac_year)->get();

        $index = 0;
        foreach($data['students'] as $std){
            $data['students'][$index]['payment'] = $std->payments()->where('semester',$this->getCurrentSem()->sem_str)->first();
            $index++;
        }

        return view('financer.details',compact('data',$data))->with('selected_ac_year',$selected_ac_year);
    }
}
