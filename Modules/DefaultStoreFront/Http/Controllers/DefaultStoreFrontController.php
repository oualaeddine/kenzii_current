<?php

namespace Modules\DefaultStoreFront\Http\Controllers;

use App\Events\OrderStatus;
use App\Helpers\VisitorLogHelper;
use App\Models\Visitor;
use App\Notifications\NewOrder;
use App\Traits\FcmSend;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\OldStoreFront\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Orders\Entities\Order;
use Modules\Products\Entities\Product;
use Modules\Products\Entities\ProductPhoto;
use Modules\Orders\Entities\OrderProduct;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Stores\Entities\Store;

class DefaultStoreFrontController extends Controller
{

    use FcmSend;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $id)
    {

        /* $store_id = 1; */
        
        $product = StoreProduct::findorFail($id)->product_spec;

        $page_title = 'product-' . $product->name;

        $product_photos = ProductPhoto::where('product_id', $product->id)->get();


        $price_info = StoreProduct::findorFail($id);

        $store_id = $price_info->store_id;

        $visitor_id = VisitorLogHelper::StoreVisitor($request, $price_info);

        Session::put('visitor_id', $visitor_id);
        //

        return view('DefaultStoreFront::index', compact('page_title', 'product', 'product_photos', 'price_info'))->with('fb_pixel', $this->fbPixel($store_id));;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function checkout_form(Request $request)
    {
        if ($request->store_product == null) {
            return redirect()->route('store.home');
        }

        /*  $store_id = $request->store_id; */

        $price_info = StoreProduct::findorFail($request->store_product);

        $product = Product::findorFail($price_info->product_id);

        $store_id = $price_info->store_id;

        $page_title = 'checkout-' . $product->name;

        /*         $price_info = DB::table('store_products')
                    ->where('store_id', $store_id)->where('product_id', $request->product_id)->first(); */

        return view('DefaultStoreFront::checkout', compact('page_title', 'product', 'price_info'))->with('fb_pixel', $this->fbPixel($store_id));;
        /* return view('DefaultStoreFront::create'); */
    }

    public function checkout(Request $request)
    {
        /* $store_id = $request->store_id; */

        $messages =
            [
                'state.required' => 'يجب عليك إدخال الولاية',
                'firstname.required' => 'يجب عليك إدخال الإسم',
                'firstname.max' => 'الحد الأقصى 255 حرف ',
                'state.max' => 'الحد الأقصى 255 حرف ',
                'phone.required' => 'يجب عليك إدخال رقم الهاتف متكون من 10 أرقام او اكثر',
            ];

        $validator = Validator::make($request->all(), [
            'state' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'phone' => 'required',
        ], $messages);


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('danger', $response);

            return redirect()->back();
        }

        // get visitor id 
        $visitor_id = Session::get('visitor_id');

        $store_product = StoreProduct::findorFail($request->store_product);

        // save order 

        $order = new Order();
        $order->name = $request->firstname;
        $order->phone = $request->phone;
        $order->wilaya = $request->state;
        $order->visitor_id = $visitor_id;
        $order->last_status = 'new';
        $order->store_id = $store_product->store_id;
        $order->save();

        // get store 
        $store = Store::find($order->store_id);

        //price
        /*  $price_info = DB::table('store_products')->where('store_id',$store_product->store_id)->where('product_id', $store_product->product_id)->first(); */


        // fcm notif
        $this->push_notif($request, $order->id, $store->name);

        //order Product save
        $order_product = new OrderProduct();
        $order_product->product_id = $store_product->product_id;
        $order_product->quantity = 1;
        $order_product->price = $store_product->price;
        $order_product->order_id = $order->id;
        $order_product->save();


        // notif new order
        OrderStatus::dispatch($order);
        $order->notify(new NewOrder());

        Session::forget('visitor_id');

        return redirect()->route('product.thanks', [$request->firstname, $store->id])->with('fb_pixel', $this->fbPixel($store->id));
    }

    public function thanks(Request $request, $name, $store)
    {
        $store_id = $store;

        return view('DefaultStoreFront::thanks')->with('page_title', $name . ' | thank you')->with('fb_pixel', $this->fbPixel($store_id));;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request, $id)
    {
        $store_id = $request->store_id;

        return view('DefaultStoreFront::show')->with('fb_pixel', $this->fbPixel($store_id));;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {
        $store_id = $request->store_id;

        return view('DefaultStoreFront::edit')->with('fb_pixel', $this->fbPixel($store_id));;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
