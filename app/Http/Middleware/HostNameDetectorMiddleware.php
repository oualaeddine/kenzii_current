<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Modules\Stores\Entities\Store;

class HostNameDetectorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Config::get('app.url') != 'http://127.0.0.1:8000/'){
                    
            $host = $request->getHttpHost();

            $host = str_replace("www.", "", $host);


            $store = Store::where('domain', $host)->first();

            if (!isset($store)) {
                //redirect them if they don't exist
                abort(404);
            }
            $request->merge(['store' => $store->id]);

        }else{
            $request->merge(['store' => 1]);
        }


        return $next($request);
    }
}
