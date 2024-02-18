<?php

namespace Modules\OldStoreFront\Http\Controllers;

use App\Helpers\VisitorLogHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\OldStoreFront\Entities\StoreProduct;

class ProductsController extends Controller
{

    public function show(Request $request, $id)
    {

        $store_id = $request->store;
        $product = StoreProduct::find($id);

        $visitor_id = VisitorLogHelper::StoreVisitor($request, $product);
        Session::put('visitor_id',$visitor_id);

        return view('OldStoreFront::product')
            ->with('storeProduct', $product)
            ->with('page_title', $this->storeName($store_id) . ' | ' . $product->product->name)
            ->with('fb_pixel', $this->fbPixel($store_id));
    }


}
