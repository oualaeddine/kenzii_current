<?php

namespace Modules\OldStoreFront\Http\Controllers;

use App\Helpers\VisitorLogHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\OldStoreFront\Entities\StoreProduct;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $store_id = $request->store;
        // $products =\App\Models\Product::with('photos')->with('price')->has('price')->get();

        $products = StoreProduct::where("store_id",$store_id)->with('product_spec.productPhotos')
            ->where("visible",true)->get();


         $visitor_id = VisitorLogHelper::StoreVisitorSpec($request);
     
         Session::put('visitor_id',$visitor_id);


        return view('OldStoreFront::index')
            ->with('products', $products)
            ->with('page_title', $this->storeName($store_id) . ' | home')
            ->with('fb_pixel', $this->fbPixel($store_id));
    }
}
