<?php

namespace App\Http\Middleware;

use Closure;

class UserAuthCheck
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
        if($request->session()->has('drsAuth')===false || $request->session()->get('drsAuth')!==1){
            return redirect()->route('user.login.view');
        }
        return $next($request);
    }
}
