<?php

namespace Modules\OldStoreFront\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Modules\OldStoreFront\Entities\Store;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function storeName($store_id)
    {
        $store = Store::find($store_id);
        return $store->name;
    }

    function fbPixel($store_id)
    {
        $store = Store::find($store_id);
        return $store->fb_pixel;
    }
}
