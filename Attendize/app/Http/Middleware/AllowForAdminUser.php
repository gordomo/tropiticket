<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AllowForAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->email === 'morimartin@gmail.com')
        {

            return $next($request);
        
        }
        return Redirect::route('showOrganiserDashboard', [Auth::user()->id])->with('message', trans('User.restricted'));
    }
}
