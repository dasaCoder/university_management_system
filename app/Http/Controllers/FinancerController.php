<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancerController extends Controller
{
    public function index(){
        return view('financer.financer');
    }
}
