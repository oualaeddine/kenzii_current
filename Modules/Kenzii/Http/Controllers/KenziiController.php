<?php

namespace Modules\Kenzii\Http\Controllers;

use App\Events\OrderStatus;
use App\Helpers\SendToEcoManager;
use App\Helpers\VisitorLogHelper;
use App\Models\Visitor;
use App\Traits\FcmSend;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

        $page_title = 'LaSoft Pro Algeria - لاسوفت برو الجزائر';
        return view('kenzii::index', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));;
    }

    public function checking(Request $request)
    {
        $page_title = 'LaSoft Pro - هل جهازي أصلي ؟';
        return view('kenzii::checking', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));;
    }


    public function product(Request $request)
    {
        $store_product = StoreProduct::findorFail(8);

        $visitor_id = VisitorLogHelper::StoreVisitor($request, $store_product);
        Session::put('visitor_id', $visitor_id);

        $page_title = 'LaSoft Pro - قدم طلبك';
        return view('kenzii::product', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));
    }

    public function checkout(Request $request)
    {

        $product = Product::findorFail(5);

        $price_info = DB::table('store_products')
            ->where('store_id', $request->store)
            ->where('product_id', $product->id)->first();

        $color = 'White';

        /*   if ($request->product != null) {
              $color = $request->product;
          } */


        $page_title = 'LaSoft Pro - Checkout Page';
        return view('kenzii::checkout',
            compact('page_title', 'color', 'price_info', 'product'))
            ->with('fb_pixel', $this->fbPixel($request->store));;
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
        //$order->comments = 'The Picked color is : ' . $request->color;
        $order->store_id = $request->store;
        $order->last_status = 'new';
        $order->visitor_id = $visitor_id;
        $order->save();

        $store = Store::find($order->store_id);


        $product_id = 5;

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

        $page_title = 'LaSoft Pro | Thank you';

        Session::forget('visitor_id');
        Log::info(' $this->storeOrder($order)');

        $this->storeOrder($order);

        return view('kenzii::thankyou', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));;
    }


    public function storeOrder($order)
    {

        Log::info('Asynchronous request storeOrder');
        $products = [];
        $total = 0;
        foreach ($order->orderProducts as $product) {
            $products [] =
                [
                    'name' => $product->product->name,
                    'sku' => "LASOFT" . $product->product_id,
                    'quantity' => $product->quantity,
                    'price' => $product->price
                ];

            $total += $product->price;
        }


        $data = [
            //  'client_id' => 1,
            'store_id' => 2,
            //    'status_id' => 3,
            // 'shipping_channel_id' => 4,
            'full_name' => $order->name,
            'phone' => $order->phone,
            'order_date' => $order->created_at,
            'total_amount' => $total,
            'comments' => $order->comments,
            'address' => $order->wilaya,
            //'city_id' => 5,
            'products' => $products
        ];

        // Start the asynchronous request
        $response = Http::post('https://app.kseltechnology.com/api/v1/webhook/orders', $data);
        $statusCode = $response->status(); // HTTP status code
        $responseData = $response->json(); // Get the response data as an array

        // Log the response status and data
        Log::info('Asynchronous request completed', [
            'status' => $statusCode,
            'response_data' => $responseData
        ]);

        // You can also check the status code to log different messages based on the result
        if ($statusCode === 200) {
            Log::info('Order successfully processed', $responseData);
        } else {
            Log::error('Order processing failed', $responseData);
        }


        // Perform other tasks without waiting for the HTTP request to complete
        // For example, save data locally or process other things

        // Handle the response when the request is finished
    /*    $response->then(function ($response) {
            // Log the response data
            $statusCode = $response->status(); // HTTP status code
            $responseData = $response->json(); // Get the response data as an array

            // Log the response status and data
            Log::info('Asynchronous request completed', [
                'status' => $statusCode,
                'response_data' => $responseData
            ]);

            // You can also check the status code to log different messages based on the result
            if ($statusCode === 200) {
                Log::info('Order successfully processed', $responseData);
            } else {
                Log::error('Order processing failed', $responseData);
            }
        });*/

        /* // Optionally, return a response immediately while the request is still processing
         return response()->json(['message' => 'Order is being processed']);*/
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('kenzii::create');
    }


    public function faq(Request $request)
    {

        $page_title = 'LaSoft Pro | الأسئلة الشائعة';

        return view('kenzii::faq', compact('page_title'))->with('fb_pixel', $this->fbPixel($request->store));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function most(Request $request)
    {
        return view('kenzii::most')->with('page_title', 'تعليقات الزبائن عن لاسوفت')->with('fb_pixel', $this->fbPixel($request->store));;
    }

    public function rating(Request $request)
    {
        return view('kenzii::rating')->with('page_title', 'تعليقات الزبائن عن لاسوفت')->with('fb_pixel', $this->fbPixel($request->store));;
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
