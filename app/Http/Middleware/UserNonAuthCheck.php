<?php

namespace App\Http\Middleware;

use Closure;

class UserNonAuthCheck
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
        if($request->session()->has('drsAuth') && $request->session()->get('drsAuth')===1){
            return redirect()->route('user.account');
        }
        return $next($request);
    }
}
