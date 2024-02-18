<?php

namespace Modules\DentaireStore\Http\Controllers;

use App\Events\OrderStatus;
use App\Notifications\NewOrder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Orders\Entities\Order;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Orders\Entities\Order as EntitiesOrder;
use Modules\Orders\Entities\OrderProduct;
use Modules\Stores\Entities\Store;
use Modules\Stores\Entities\Store_setting;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $page_title = 'Dentaire | Checkout';

        $cart = Cart::content();

        $cart_sub_total = Cart::subtotal();


        $settings = Store_setting::get();

        return view('dentairestore::checkout',compact('page_title','settings','cart','cart_sub_total'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
  
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
          /* $store_id = $request->store_id; */

/*           $messages =
          [
              'state.required' => 'يجب عليك إدخال الولاية',
              'firstname.required' => 'يجب عليك إدخال الإسم',
              'firstname.max' => 'الحد الأقصى 255 حرف ',
              'state.max' => 'الحد الأقصى 255 حرف ',
              'phone.required' => 'يجب عليك إدخال رقم الهاتف متكون من 10 أرقام او اكثر',
          ];
 */

 
      $validator = Validator::make($request->all(), [
          'adresse' => 'required|string|max:255',
          'first_name' => 'required|string|max:255',
          'last_name' => 'required|string|max:255',
          'shipping' => 'required',
          'phone' => 'required',
          'terms_condition' => 'required',
      ]/* , $messages */);


      if ($validator->fails()) {
          $response = array($validator->messages());
          $response = $response[0]->first();

          Session::flash('error', $response);

          return redirect()->back();
      }


      // get visitor id 
      $visitor_id = Session::get('visitor_id');

      $cart = Cart::content();

      // save order 

      $order = new Order();
      $order->name = $request->first_name.'-'.$request->last_name;
      $order->phone = $request->phone;
      $order->wilaya = $request->adresse;
      $order->visitor_id = $visitor_id;
      $order->last_status = 'new';
      $order->store_id = 1/* $store_product->store_id */;
      $order->shipping = $request->shipping;
      $order->comments =  $request->terms_condition;
      $order->save();

      // get store 
      $store = Store::find($order->store_id);

      //price
      /*  $price_info = DB::table('store_products')->where('store_id',$store_product->store_id)->where('product_id', $store_product->product_id)->first(); */


      // fcm notif
      //todo makanch push notif
     /*  $this->push_notif($request, $order->id, $store->name); */

      //order Product save
      foreach($cart as $item){

        $store_product = StoreProduct::findorFail($item->id);

        $order_product = new OrderProduct();
        $order_product->product_id = $store_product->product_id;
        $order_product->quantity = $item->qty;
        $order_product->price = $store_product->price;
        $order_product->order_id = $order->id;
        $order_product->save();

      }
 
      Cart::destroy();


      // notif new order
     /*  OrderStatus::dispatch($order);
      $order->notify(new NewOrder()); */

      Session::forget('visitor_id');

     /*  $page_title = 'Dentaire | Commande';

      $settings = Store_setting::get(); */


      return redirect()->route('dentaire_store.order',$order->id)->with('fb_pixel', $store->fb_pixel);
    }


    public function order($order_id)
    {

        $order = Order::findorfail($order_id);

        $details =  $order->orderProducts()->with('product')->get();

        $total = 0;

        $total_all = $details->map(function($q){
               return $total = $q->quantity * $q->price;
        })->sum();


        $page_title = 'Dentaire | Commande';

        $settings = Store_setting::get();

        return view('dentairestore::order',compact('page_title','settings','details','total_all','order'));
    }



    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dentairestore::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dentairestore::edit');
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
