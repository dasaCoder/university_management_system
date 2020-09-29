<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\CurrentSemester;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getCurrentSem(){
        $current_sem = CurrentSemester::whereNull('ended_at')->first();

        if($current_sem == null) {
            $current_sem = new \stdClass();
            $current_sem->sem_str = '2019/2020 Semester I';
        }
        //dd($current_sem);
        return $current_sem;
    }
}
