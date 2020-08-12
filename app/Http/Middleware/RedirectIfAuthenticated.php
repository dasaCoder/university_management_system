<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $auth = Auth::user()->roles()->first();
            switch ($auth->role) {
                case 'admin':
                    return  redirect()->route('admin');    
                    break;
                case 'lecturer':
                        return  redirect()->route('lecturer'); 
                    break;
                case 'student':
                        return  redirect()->route('student');  
                    break;

                default:
                    return  redirect()->route('home');  
                    break;
            } 
        }

        return $next($request);
    }
}
