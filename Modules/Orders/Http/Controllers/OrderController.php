<?php

namespace Modules\Orders\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Notifications\OrderAssigned;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;
use Modules\Orders\Entities\Order;
use Modules\Orders\Http\Requests\CreateOrderRequest;
use Modules\Orders\Http\Requests\UpdateOrderRequest;
use Modules\Orders\Repositories\OrderRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Log\Entities\Log;
use Modules\Orders\Entities\OrderProduct;

use Illuminate\Support\Facades\Event;
use App\Events\OrderStatus;
use App\Listeners\ChangeStatus;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     *

     */


    public function open_details_edit(Request $request, $id)
    {

        $user = Auth::user();

        $log = new Log();
        $log->order_id = $id;
        $log->user_id = $user->id;
        $log->action = 'has been opened modal of :' . $request->operation;
        $log->save();

    }

    public function change_status(Request $request, $id)
    {

        $order = Order::find($id);

        $user = Auth::user();

        DB::beginTransaction();
        try { 

        if ($request->status == 'na1' || $request->status == 'na2' || $request->status == 'AttConfNa1' || $request->status == 'AttConfNa2'  || $request->status == 'Conf1Na1' 
            || $request->status == 'Conf1Na2' || $request->status == 'AttShippNa1' || $request->status == 'AttShippNa2' ) {
            $validator = Validator::make($request->all(), [
                /* 'comment' => 'required|string', */
                'status' => 'required|string',

            ]);
        } elseif ($request->status == 'pending_c' || $request->status == 'pending_s') {
            $validator = Validator::make($request->all(), [
                'comment' => 'nullable|string',
                'status' => 'required|string',
                'alert_date' => 'required|date'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'comment' => 'nullable|string',
                'status' => 'required|string',
            ]);
        }


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }

        $mytime = Carbon::now();

        $order = Order::find($id);

        
        $order->comments = $order->comments . "\n -" . $request->status . ' : ' . $mytime->toDateTimeString();
        $order->comments = $order->comments . "\n -" . $request->comment .' '. $request->comment_note . ' : ' . $mytime->toDateTimeString();
        $order->last_status = $request->status;
        $order->alert_date = $request->alert_date ?? null;

        $order->save();

        OrderStatus::dispatch($order);

        $log = new Log();
        $log->order_id = $order->id;
        $log->user_id = $user->id;
        $log->action = 'status changed successfully to :' . $request->status;
        $log->save();

        }catch (\Throwable $e) {
            DB::rollBack();
            Session::flash('error', 'Something went wrong  please try again !');
            return redirect()->back();
        }

        DB::commit();
        Session::flash('success', 'your order status changed successfully ! to :' . $request->status);
        return redirect()->back();

    }

    /*
        public function new(Request $request)
        {
            $orders = Order::where('last_status', 'new')->orderBy('created_at', 'desc')->with('mairie')->with('store')->with('orderProducts.product')->get();

            foreach ($orders as $a) {
                $total = 0;
                $list_prod = null;

                foreach ($a->orderProducts as $op) {

                    $list_prod = $op->product->name . '-' . $list_prod;
                    $total = $total + $op->price * $op->quantity;
                }

                $a['product_names'] = $list_prod;
                $a['total'] = $total + $a->delivery_price - $a->discount;
            }


            $breadcrumbs = [
                ['link' => "orders", 'name' => "Orders"], ['name' => "New"]
            ];
            return view('orders::index')
                ->with([
                    'breadcrumbs' => $breadcrumbs,
                    'orders' => $orders
                ]);
        }*/

    public function index(Request $request)
    {
        $user = Auth::user();
        $route_name = $request->route()->getName();
        $status = str_replace('orders.', '', $route_name);


        $can_set_status = true;
        $is_all = true;

        //$status = $this->setRightStatus($status);

       if ($user->hasRole('operator')) {
            $orders = Order::
                whereHas('users', function ($q) use ($user) {
                    $q->where('assign_orders.user_id', $user->id);
                })
                ->orderBy('updated_at', 'desc')
                ->with('visitor')
                ->with('mairie')->with('store')
                ->whereHas('orderProducts.product')
                ->with('orderProducts.product')
                ->paginate('10');
        } else {
            $orders = Order::select()
                ->orderBy('updated_at', 'desc')
                ->with('visitor')
                ->with('mairie')->with('store')
                ->whereHas('orderProducts.product')
                ->with('orderProducts.product')
                ->paginate('10');
        }


        foreach ($orders as $a) {
            $total = 0;
            $list_prod = null;

            $response = $this->canSetStatus($a->last_status);

            if ($response == false) {

                $a['show'] = false;

            } else {
                $a['show'] = true;
            }


            foreach ($a->orderProducts as $op) {

                $list_prod = $op->quantity . ' x ' . $op->product->name .'('.$op->product->num.')'. '-' . $list_prod;
                $total = $total + $op->price * $op->quantity;
            }

            $a['product_names'] = $list_prod;
            $a['total'] = $total + $a->delivery_price - $a->discount;
        }


        $breadcrumbs = [
            ['link' => "orders", 'name' => "Orders"], ['name' => $status]
        ];

        $operators = User::role('operator')->get();

       
        return view('orders::index',compact('operators'))
            ->with([
                'breadcrumbs' => $breadcrumbs,
                'status' => $status,
                'can_set_status' => $can_set_status,
                'orders' => $orders,
                'is_all' => $is_all
            ]);
    }

    public function list(Request $request)
    {
        $user = Auth::user();
        $route_name = $request->route()->getName();
        $status = str_replace('orders.', '', $route_name);


        $can_set_status = $this->canSetStatus($status);
        $is_all = false;

        $status = $this->setRightStatus($status);

        if ($user->hasRole('operator') && $status =="new") {
            $orders = Order::where('last_status', $status)
                ->whereHas('users', function ($q) use ($user) {
                    $q->where('assign_orders.user_id', $user->id);
                })
                ->orderBy('created_at', 'desc')
                ->with('mairie')->with('store')
                ->with('visitor')
                ->whereHas('orderProducts.product')
                ->with('orderProducts.product')
                ->paginate('10');
        } else {
            $orders = Order::where('last_status', $status)
                ->orderBy('created_at', 'desc')
                ->with('mairie')->with('store')
                ->with('visitor')
                ->whereHas('orderProducts.product')
                ->with('orderProducts.product')
                ->paginate('10');
        }


        foreach ($orders as $a) {
            $total = 0;
            $list_prod = null;

            $response = $this->canSetStatus($a->last_status);

            if ($response == false) {

                $a['show'] = false;

            } else {
                $a['show'] = true;
            }


            foreach ($a->orderProducts as $op) {

                $list_prod = $op->quantity . ' x ' . $op->product->name .'('.$op->product->num.')'. '-' . $list_prod;
                $total = $total + $op->price * $op->quantity;
            }

            $a['product_names'] = $list_prod;
            $a['total'] = $total + $a->delivery_price - $a->discount;
        }


        $breadcrumbs = [
            ['link' => "orders", 'name' => "Orders"], ['name' => $status]
        ];

        $operators = User::role('operator')->get();

        return view('orders::index',compact('operators'))
            ->with([
                'breadcrumbs' => $breadcrumbs,
                'status' => $status,
                'can_set_status' => $can_set_status,
                'orders' => $orders,
                'is_all' => $is_all
            ]);
    }

    /**
     * Show the form for creating a new Order.
     *
     */
    public function create()
    {
        return view('orders::create');
    }

    public function assignAllTo(Request $request,$id)
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->users()->attach($id);
            $order->save();
        }
        return "ok";
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     */

    public function assign(Request $request)
    {

        $messages = ['operator_id' => 'You must choose a operator',
            'order_id' => 'You must choose order',
        ];


        $validator = Validator::make($request->all(), [

            'order_id' => 'required|string',
            'operator_id' => 'required|string',

        ], $messages);


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }
        $order = Order::findOrfail($request->order_id);
        $order->users()->attach($request->operator_id);
        /* $order->last_status = 'Assigned'; */
        $order->save();
        $order->notify(new OrderAssigned());

        Session::flash('success', 'your order assgined successfully !');
        return redirect()->back();


    }

    public function store(Request $request)
    {

        $messages = ['store_id' => 'You must choose a sotre',
            'id_mairie' => 'You must choose mairie',
            'product_id' => 'You must choose at least one product'];


        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
            'wilaya' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:65000',
            'id_mairie' => 'required|string|max:255',
            'store_id' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0',
            'delivery_price' => 'required|numeric|min:0',
            'product.*' => 'required|array',
            'product.*.price' => 'required|numeric|min:0',
            'product.*.qty' => 'required|numeric|min:0',
            'product.*.product_id' => 'required',
        ], $messages);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();


            Session::flash('error', $response);


            return redirect()->back();
        }


        $order = new Order();
        $order->name = $request->name;
        $order->last_status = 'new';
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->wilaya = $request->wilaya;
        $order->store_id = $request->store_id;
        $order->id_mairie = $request->id_mairie;
        $order->comments = $request->comment;
        $order->discount = $request->discount;
        $order->delivery_price = $request->delivery_price;
        $order->save();

        /*  assign to operator */

        /*    $id_user_logged_in = Auth::user()->id;

           $order->users()->attach($id_user_logged_in); */


        foreach ($request->product as $p) {

            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $p['product_id'];
            $order_product->quantity = $p['qty'];
            $order_product->price = $p['price'];
            $order_product->save();

        }


        Session::flash('success', 'your order stored successfully !');

        return redirect()->route('orders');

        /*        return $request->product; */


        /*    $input = $request->all();

           $order = $this->orderRepository->create($input);

           Flash::success('Order saved successfully.');

           return redirect(route('orders.index')); */
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $user = Auth::user();
        /* $route_name = $request->route()->getName(); */
        $status = Order::findOrFail($id)->last_status;/* str_replace('orders.', '', $route_name); */


        $can_set_status = $this->canSetStatus($status);

        $is_all = false;

        $status = $this->setRightStatus($status);


        $orders = Order::where('id', $id)
            ->orderBy('created_at', 'desc')
            ->with('mairie')->with('store')
            ->with('orderProducts.product')
            ->paginate(1);

        foreach ($orders as $a) {
            $total = 0;
            $list_prod = null;

            foreach ($a->orderProducts as $op) {

                $list_prod = $op->quantity . ' x ' . $op->product->name . '-' . $list_prod;
                $total = $total + $op->price * $op->quantity;
            }

            $a['product_names'] = $list_prod;
            $a['total'] = $total + $a->delivery_price - $a->discount;
        }


        $breadcrumbs = [
            ['link' => "orders", 'name' => "Orders"], ['name' => $status]
        ];

        $operators = User::role('operator')->get();

        return view('orders::index',compact('operators'))
            ->with([
                'breadcrumbs' => $breadcrumbs,
                'status' => $status,
                'can_set_status' => $can_set_status,
                'orders' => $orders,
                'is_all' => $is_all
            ]);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $order = Order::where('id',$id)->with('mairie')->with('orderProducts.product')->first();


   
        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders::edit')->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     */
    public function update($id, Request $request)
    {
     /*    $messages = ['store_id' => 'You must choose a sotre',
            'id_mairie' => 'You must choose mairie']; */

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
            'wilaya' => 'nullable|string|max:255',
            'comment' => 'nullable|string|max:65000',
            'id_mairie' => 'nullable|string|max:255',
           /*  'store_id' => 'nullable|string|max:255', */
            'discount' => 'required|numeric|min:0',
            'delivery_price' => 'required|numeric|min:0',
        ]/* , $messages */);

        if ($validator->fails()) {

            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error',$response);

            return redirect()->route('order.edit',$id);


        }


        $order = Order::findOrfail($id);
        $order->name = $request->name;
        /*  $order->last_status = 'confirmed1'; */
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->wilaya = $request->wilaya;
    /*     if ($request->store_id != null) {
            $order->store_id = $request->store_id;
        } */
        $order->id_mairie = $request->id_mairie;
        $order->comments = $request->comment;
        $order->discount = $request->discount;
        $order->delivery_price = $request->delivery_price;
        $order->save();


      /*   $order_product = OrderProduct::find($request->order_product_id);

      
        
        $order_product->quantity = $request->order_p;
        $order_product->save(); */

        Session::flash('success','your order updated successfully');

        return redirect()->route('orders');
    }


    public function update_confirm($id, Request $request)
    {
        $user = Auth::user();

        $messages = ['store_id' => 'You must choose a sotre',
            'id_mairie' => 'You must choose mairie'];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
            'wilaya' => 'nullable|string|max:255',
            'comment' => 'required|string|max:65000',
            'id_mairie' => 'nullable|string|max:255',
            'store_id' => 'nullable|string|max:255',
            'discount' => 'required|numeric|min:0',
            'delivery_price' => 'required|numeric|min:0',
        ], $messages);

        if ($validator->fails()) {

            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back()->with('error', $response);


        }


        $mytime = Carbon::now();

        $order = Order::findOrfail($id);
        $order->name = $request->name;
        /*  $order->last_status = 'confirmed1'; */
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->wilaya = $request->wilaya;
        if ($request->store_id != null) {
            $order->store_id = $request->store_id;
        }
        $order->last_status = $request->status;

        $order->id_mairie = $request->mairie_id;
        /* $order->comments = $request->comment; */
        $order->comments = $order->comments . "\n -" . $request->status . ' : ' . $mytime->toDateTimeString();
        $order->comments = $order->comments . "\n -" . $request->comment . ' : ' . $mytime->toDateTimeString();
        $order->discount = $request->discount;
        $order->delivery_price = $request->delivery_price;
        $order->save();


        $log = new Log();
        $log->order_id = $order->id;
        $log->user_id = $user->id;
        $log->action = 'status changed successfully to :' . $request->status;
        $log->save();

        /*  Session::flash('success', 'your order status changed successfully !'); */
        OrderStatus::dispatch($order);

        return redirect()->back()->with('success', 'your order status changed successfully !');
    }


    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     */




    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect()->back();
    }


    private function setRightStatus($status)
    {
        switch ($status) {
            case "en_p":
                return "En préparation";
            case "r_wilaya":
                return "Reçu à Wilaya";
            case "sortie":
                return "Sorti en livraison";
            case "alerte":
                return "En alerte";
            case "t_echoue":
                return "Tentative échouée";
            case "att_c":
                return "En attente du client";
            case "attente":
                return "En attente";
            case "expedie":
                return "Expédié";
            case "v_wilaya":
                return "Vers Wilaya";
            case "transfert":
                return "Transfert";
            case "centre":
                return "Centre";
            case "delivered":
                return "Livré";
            case "echec":
                return "Echèc livraison";
            case "canceled":
                return "canceled";
            default :
                return $status;
        }
    }

    private function canSetStatus($status): bool
    {
        switch ($status) {
            case "echec":
            case "delivered":
            case "centre":
            case "transfert":
            case "v_wilaya":
            case "r_wilaya":
            case "sortie":
            case "alerte":
            case "t_echoue":
            case "att_c":
            case "attente":
            case "expedite":
                /* case "en_p": */
                return false;
            default :
                return true;
        }
    }


}
