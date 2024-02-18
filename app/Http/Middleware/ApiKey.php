<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiKey
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

        if($request->has('api_key') && $request->api_key == '4IZQ35oGAmeLUtuxMNa72mlzJebc38SaEUhDq1EaqZa'){
            return $next($request);
    
        }else{
    
                return Response::json([
                    'success' => false,
                    'message' => 'Oops stop here !'
                ], 200);
    
        }
            
        
    }
}
