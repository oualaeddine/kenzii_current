<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Is_Ad_sup_ope
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('supervisor')  ||Auth::user()->hasRole('operator')  ){
            return $next($request);
        }
       
        return abort(404);
    }
}
