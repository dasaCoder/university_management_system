<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    
    public function redirectTo()
    {
        $user = Auth::user();
        //dd($user->getRoleNames());
        switch ($user->getRoleNames()->first()) {
            case 'admin':
                return  '/admin';    
                break;
            case 'lecturer':
                    return '/lecturer'; 
                break;
            case 'student':
                    return  '/student';  
                break;

            default:
                return  '/home';  
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
