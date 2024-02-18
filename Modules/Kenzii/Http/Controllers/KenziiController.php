<?php

namespace Modules\Kenzii\Http\Controllers;

use App\Events\OrderStatus;
use App\Helpers\SendToEcoManager;
use App\Helpers\VisitorLogHelper;
use App\Models\Visitor;
use App\Traits\FcmSend;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\OldStoreFront\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Orders\Entities\Order;
use Modules\Orders\Entities\OrderProduct;
use Modules\Products\Entities\Product;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Stores\Entities\Store;

class KenziiController extends Controller
{

    use FcmSend;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        /* VisitorLogHelper::StoreVisitor($request, 1); */

        $page_title = 'Kenzii | homepage';
        return view('kenzii::index', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));;
    }

    public function checking(Request $request)
    {
        $page_title = 'Kenzii | checking';
        return view('kenzii::checking', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));;
    }


    public function product(Request $request)
    {
        $store_product = StoreProduct::findorFail(1);

        $visitor_id = VisitorLogHelper::StoreVisitor($request, $store_product);
        Session::put('visitor_id', $visitor_id);

        $page_title = 'Kenzii | product';
        return view('kenzii::product', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));
    }

    public function checkout(Request $request)
    {

        $product = Product::findorFail(1);

        $price_info = DB::table('store_products')->where('store_id', $request->store)->where('product_id', 5)->first();

        $color = 'White';

      /*   if ($request->product != null) {
            $color = $request->product;
        } */


        $page_title = 'Kenzii | checkout';
        return view('kenzii::checkout', compact('page_title', 'color', 'price_info', 'product'))->with('fb_pixel', $this->fbPixel($request->store));;
    }


    public function checkout_confirm(Request $request)
    {
        $messages =
            [
                'state.required' => 'يجب عليك إدخال الولاية',
                'phone.required' => 'يجب عليك إدخال رقم الهاتف',
                'firstname.required' => 'يجب عليك إدخال الإسم',
                'firstname.max' => 'الحد الأقصى 255 حرف ',
                'state.max' => 'الحد الأقصى 255 حرف ',
            ];

        $validator = Validator::make($request->all(), [

            'state' => 'required|string|max:255',
            'phone' => 'required|numeric|min:10',
            'firstname' => 'required|string|max:255',

        ], $messages);


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('danger', $response);

            /*  return $response; */

            return redirect()->route('kenzii.checkout');
        }


        // get visitor id 
        $visitor_id = Session::get('visitor_id');


        $order = new Order();
        $order->name = $request->firstname;
        $order->phone = $request->phone;
        $order->wilaya = $request->state;
        $order->comments = 'The Picked color is : ' . $request->color;
        $order->store_id = $request->store;
        $order->last_status = 'new';
        $order->visitor_id = $visitor_id;
        $order->save();

        $store = Store::find($order->store_id);


        if ($request->color == 'White') {
            $product_id = 1;
            $ref = "ipl_white";
        } else {
            $product_id = 2;
            $ref = "ipl_pink";
        }


        $price_info = DB::table('store_products')->where('store_id', $request->store)->where('product_id', $product_id)->first();

        /*  $this->push_notif($request, $order->id, $store->name); */

        $order_product = new OrderProduct();
        $order_product->product_id = $product_id;
        $order_product->quantity = 1;
        $order_product->price = $price_info->price;
        $order_product->order_id = $order->id;
        $order_product->save();

        
        OrderStatus::dispatch($order);
/*
        $visitor = Visitor::find($visitor_id);

        $src = $visitor->host . " | " . $visitor->tsrc;

        $price = $order_product->price;

        SendToEcoManager::sendToEcoManager($order->name, $order->phone, $order->wilaya, $ref, $src, $price);*/

        $page_title = 'Kenzii | Thank you';

        Session::forget('visitor_id');

        return view('kenzii::thankyou', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('kenzii::create');
    }


    public function faq(Request  $request)
    {

        $page_title = 'Kenzii | FAQ';

        return view('kenzii::faq', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function most(Request $request)
    {
        return view('kenzii::most')->with('page_title', 'Title here')->with('fb_pixel', $this->fbPixel($request->store));;
    }

    public function rating(Request $request)
    {
        return view('kenzii::rating')->with('page_title', 'Title here')->with('fb_pixel', $this->fbPixel($request->store));;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('kenzii::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('kenzii::edit');
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
