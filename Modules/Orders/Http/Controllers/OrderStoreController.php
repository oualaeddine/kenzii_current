<?php

namespace Modules\Orders\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Orders\Entities\Order;
use Modules\Orders\Entities\OrderProduct;
use PhpParser\Node\Expr\New_;

class OrderStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('orders::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
            'wilaya' => 'required|string|max:255',
            'products.*' => 'required',

        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            /* $response = $response[0]->first(); */

            foreach ($response as $r) {
                Session::flash('error', $r->first());
            }

            return redirect()->back();
        }


        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->wilaya = $request->wilaya;
        $order->save();


        foreach ($request->products as $p) {

            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $p->product_id;
            $order_product->quantity = $p->quantity;
            $order_product->price = $p->price;
            $order_product->save();

        }


        Session::flash('success', 'order products stored successfully , we will contact you to get more informations and confirm your order thanks .');

        return redirect()->back();

    }


    public function store_for_dash(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
            'wilaya' => 'required|string|max:255',
            'products.*' => 'required',

        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            /* $response = $response[0]->first(); */

            foreach ($response as $r) {
                Session::flash('error', $r->first());
            }

            return redirect()->back();
        }


        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->wilaya = $request->wilaya;
        $order->save();


        foreach ($request->products as $p) {

            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $p->product_id;
            $order_product->quantity = $p->quantity;
            $order_product->price = $p->price;
            $order_product->save();

        }


        Session::flash('success', 'your order stored successfully !');

        return redirect()->route('orders');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('orders::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('orders::edit');
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
