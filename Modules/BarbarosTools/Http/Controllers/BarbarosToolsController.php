<?php

namespace Modules\BarbarosTools\Http\Controllers;

use App\Events\OrderStatus;
use App\Helpers\VisitorLogHelper;
use App\Notifications\NewOrder;
use App\Traits\FbSavePoint;
use App\Traits\FcmSend;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Categories\Entities\Category;
use Modules\Orders\Entities\Order;
use Modules\Orders\Entities\OrderProduct;
use Modules\Products\Entities\Product;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Stores\Entities\Store;

class BarbarosToolsController extends Controller
{
    use FbSavePoint, FcmSend;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        $visitor_id = VisitorLogHelper::StoreVisitorSpec($request);
        Session::put('visitor_id', $visitor_id);

        //categories 

        $categories = Category::get();

        $category_selected = urldecode($request->category) ?? null;

        //get store 
        $store = $request->store;
        $store = Store::findorfail($store);
        /*       $host = request()->getHost();

              $store = str_replace('.com', '', $host);

              $store = Store::where('name',$store 'barbarostools')->first(); */
        ///

        $search = $request->search ?? null;
        //

        if ($category_selected != null) {

            $products = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product.brand')->with('product.main_photo')
                ->whereHas('store_product_category.category', function ($q) use ($category_selected) {
                    $q->where('name', $category_selected);
                })->paginate(12)->appends(request()->query());

        } elseif ($search != null) {

            // search 

            $products = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')->orWhere('num', 'like', '%' . $request->search . '%');
            })->whereHas('product.brand')->with('product.main_photo')->paginate(12)->appends(request()->query());

        } else {
            $products = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product.brand')->with('product.main_photo')->paginate(12)->appends(request()->query());
        }


        $page_title = 'الرئيسية';

        /*  $count_all = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product')->count(); */

        return view('barbarostools::index', compact('page_title', 'products', 'search', /* 'count_all', */ 'categories', 'category_selected'))->with('fb_pixel', $store->fb_pixel);
    }


    public function load_more(Request $request, $page)
    {
        //get store 
        $store = $request->store;
        $store = Store::findorfail($store);
        ///

        $skip = $page * 12;

        $products = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product')->with('product.main_photo')->with('store_product_category.category')->skip($skip)->limit(12)->get();

        $page_title = 'الرئيسية';

        return view('barbarostools::pages.load_more', compact('page_title', 'products'))->with('fb_pixel', $store->fb_pixel);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    public function product_details(Request $request, $ref)
    {

        //get store 
        $store = $request->store;
        $store = Store::findorfail($store);
        ///

        /* $product_ref = $ref; */

        /// product
        $product = Product::where('num', $ref)->with('productPhotos')->with('brand')->with('main_photo')->first();

        if ($product == null) {
            return abort(404);
        }

        $store_product = StoreProduct::where('product_id', $product->id)->where('store_id', $store->id)->first();
        ///

        $visitor_id = VisitorLogHelper::StoreVisitor($request, $store_product);
        Session::put('visitor_id', $visitor_id);

        $products = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product.brand')->with('product.main_photo')->inRandomOrder()->limit(8)->get();


        $page_title = $product->name;


        return view('barbarostools::products', compact('page_title', 'store_product', 'product', 'products'))->with('fb_pixel', $store->fb_pixel);
    }


    public function product(Request $request, $name)
    {

        //get store 
        $store = $request->store;
        $store = Store::findorfail($store);
        ///

        $product_name = str_replace('-', ' ', $name);

        /// product
        $product = Product::where('name', $product_name)->with('productPhotos')->with('brand')->first();
        $store_product = StoreProduct::where('product_id', $product->id)->where('store_id', $store->id)->first();
        ///

        $visitor_id = VisitorLogHelper::StoreVisitor($request, $store_product);
        Session::put('visitor_id', $visitor_id);

        $products = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product.brand')->with('product.main_photo')->inRandomOrder()->limit(8)->get();


        $page_title = $product_name;


        return view('barbarostools::products', compact('page_title', 'store_product', 'product', 'products'))->with('fb_pixel', $store->fb_pixel);
    }


    public function checkout_form(Request $request, $store_product)
    {

        $product = StoreProduct::where('id', $store_product)->with('product')->first();

        $quantity = $request->quantity ?? 1;

        $page_title = 'أطلب الأن';

        $store = Store::find($product->store_id);

        return view('barbarostools::checkout', compact('page_title', 'store_product', 'quantity', 'product'))->with('fb_pixel', $store->fb_pixel);
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

            Session::flash('error', $response);

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
        //todo makanch push notif
        $this->push_notif($request, $order->id, $store->name);

        //order Product save
        $order_product = new OrderProduct();
        $order_product->product_id = $store_product->product_id;
        $order_product->quantity = $request->quantity;
        $order_product->price = $store_product->price;
        $order_product->order_id = $order->id;
        $order_product->save();

        $price = $order_product->price * $order_product->quantity;

        // notif new order
        OrderStatus::dispatch($order);
        $order->notify(new NewOrder());

        Session::forget('visitor_id');

        return redirect()->route('barbarostools.thanks', [$request->firstname, $store->id, $price])->with('fb_pixel', $store->fb_pixel);
    }

    public function thanks(Request $request, $name, $store, $price)
    {

        $store_id = $store;

        $store = Store::find($store_id);

        return view('barbarostools::pages.thanks')
            ->with('page_title', $name . ' | شكرا لك')
            ->with('price', $price)
            ->with('fb_pixel', $store->fb_pixel);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function contact()
    {
        return view('barbarostools::pages.contact')->with('page_title', 'Barbaros Tools | تواصل معنا');
    }


    public function faq()
    {
        return view('barbarostools::pages.faq')->with('page_title', 'Barbaros Tools | الأسئلة الأكثر شيوعا');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function contact_post(Request $request)
    {

        $data = [
            'email' => $request->email,
            'message_req' => $request->message,

        ];

        Mail::send('emails.support', $data, function ($message) {
            $message->to(Config::get('app.contact_mail'), 'Client')
                ->subject('New Contact Message !');
        });


        Session::flash('success', 'شكرا لك على مراسلتنا  تم تسجيل رسالتك بنجاح! ');

        return redirect()->route('barbarostools.contact');
    }

    public function terms(Request $request)
    {

        $store = $request->store;
        $store = Store::findorfail($store);

        $content = $store->terms;

        return view('barbarostools::pages.terms', compact('content'))->with('page_title', 'Barbaros Tools | الأحكام والشروط');
    }

    public function privacy(Request $request)
    {
        $store = $request->store;
        $store = Store::findorfail($store);

        $content = $store->privacy;


        return view('barbarostools::pages.privacy', compact('content'))->with('page_title', 'Barbaros Tools | سياسة الخصوصية');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('barbarostools::edit');
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
