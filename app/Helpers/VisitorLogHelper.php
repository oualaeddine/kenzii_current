<?php


namespace App\Helpers;


use App\Models\Visitor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class VisitorLogHelper
{

    public static function StoreVisitor(Request $request, $store_product)
    {
        //get host
        $host = $request->getHttpHost();
        $host = str_replace("www.", "", $host);


        $visitor = new Visitor();
        $visitor->host = $host;
        if ($request->tsrc == null) {
            $visitor->tsrc = 'Direct';
        } else {
            $visitor->tsrc = $request->tsrc;
        }
        $visitor->product_id = $store_product->product_id;
        $visitor->store_product_id = $store_product->id;
        $visitor->save();

        return $visitor->id;
    }

    public static function StoreVisitorSpec(Request $request)
    {
        //get host
        $host = $request->getHttpHost();
        $host = str_replace("www.", "", $host);


        $visitor = new Visitor();
        $visitor->host = $host;
        if ($request->tsrc == null) {
            $visitor->tsrc = 'Direct';
        } else {
            $visitor->tsrc = $request->tsrc;
        }
        $visitor->save();

        return $visitor->id;
    }
}