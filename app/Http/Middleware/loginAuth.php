<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loginAuth
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
        if(auth()->check()) {

            return $next($request);
        }
        $request->session()->flash('loginerror', 'You must be logged in to access this page.');
        return redirect('/adminlogin');
    }
}
