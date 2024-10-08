<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class roleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->get('role')=='admin'){

            return $next($request);
        }
        $request->session()->flash('rolealert', 'You are not authorized to access this page.');
        return redirect('/adminlogin');
    }
}
