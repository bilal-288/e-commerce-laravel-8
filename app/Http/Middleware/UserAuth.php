<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserAuth
{
    /**
     * How to use it.
     * Step 1: Regiter in kernal.php
     * Step 2: Also add session in kernal.php
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next):mixed
    {
        /**
         * $request->path()=="index": give that route name from where request init. 
         */
        if($request->path()=="index" && $request->session()->has('user'))
        {
            return redirect('/');
        }
        return $next($request);
    }
}
