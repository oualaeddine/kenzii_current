<?php

namespace Modules\OldStoreFront\Http\Controllers;

use App\Helpers\VisitorLogHelper;
use Illuminate\Http\Request;
use App\Traits\FcmSend;
use Illuminate\Support\Facades\Session;
use Modules\OldStoreFront\Entities\Order;
use Modules\OldStoreFront\Entities\Order_product;
use Modules\OldStoreFront\Entities\Store;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\OldStoreFront\Events\NewOrderEvent;
use Modules\OldStoreFront\Http\Requests\StoreOrderRequest;

class OrdersController extends Controller
{

    use FcmSend;

    /**
     * Display a listing of the resource.
     *
     * @param $product
     */
    public function index(Request $request)
    {
        $store_id = $request->store;
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $product = StoreProduct::find($product_id);

        $visitor_id = VisitorLogHelper::StoreVisitor($request,$product);
     
        Session::put('visitor_id',$visitor_id);

        return view('OldStoreFront::cart')
            ->with('storeProduct', $product)
            ->with('quantity', $quantity)
            ->with('page_title', $this->storeName($store_id) . ' | order')
            ->with('fb_pixel', $this->fbPixel($store_id));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $product
     */
    public function new(Request $request)
    {
        $store_id = $request->store;

        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $product = StoreProduct::find($product_id);

        $visitor_id = VisitorLogHelper::StoreVisitor($request,$product);
     
        Session::put('visitor_id',$visitor_id);
        
        return view('OldStoreFront::cart')
            ->with('storeProduct', $product)
            ->with('quantity', $quantity)
            ->with('page_title', $this->storeName($store_id) . ' | order')
            ->with('fb_pixel', $this->fbPixel($store_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreOrderRequest $request)
    {

        $store_id = $request->store;
        $oder_request = $request->except(['product_id', 'quantity', 'price', 'token']);


        // get visitor id 
        $visitor_id = Session::get('visitor_id');
         

        $order = Order::create($oder_request);
        $order->store_id = $store_id;
        $order->visitor_id = $visitor_id;
        $order->last_status = 'new';
        $order->save();

        $store = Store::find($order->store_id);


        $this->push_notif($request, $order->id, $store->name);

        $order_product = new Order_product();
        $order_product->product_id = $request['product_id'];
        $order_product->quantity = $request['quantity'];
        $order_product->price = $request['price'];
        $order_product->order_id = $order->id;
        $order_product->save();

        NewOrderEvent::dispatch($order);

        Session::forget('visitor_id');

        return view('OldStoreFront::remercier')->with('page_title', $this->storeName($store_id) . ' | thank you')
            ->with('fb_pixel', $this->fbPixel($store_id));
    }


}
