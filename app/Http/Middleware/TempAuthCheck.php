<?php

namespace App\Http\Middleware;

use Closure;

class TempAuthCheck
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
        $user = 29;
        if($request->session()->has('drsAuth')!==false || $request->session()->get('drsAuth')===1){
            $user = $request->session()->get('drsUserID');
        }

        $request->attributes->add(['loginuser' => $user]);

        return $next($request);
    }
}
