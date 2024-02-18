<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Log\Entities\Log;

class LogSave
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

        $user = Auth::user();

        $log = new Log();
       /*  $log->order_id = $id; */
        $log->user_id = $user->id;
        $log->action = 'User Has opened page of :'.$request->route()->getName();
        $log->save();
        
        return $next($request);
    }
}
