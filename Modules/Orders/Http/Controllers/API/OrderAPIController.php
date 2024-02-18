<?php

namespace Modules\Orders\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Modules\CaisseEuro\Entities\CaisseEuro;
use Modules\Orders\Entities\Order;
use Modules\Orders\Http\Requests\CreateOrderRequest;
use Modules\Orders\Http\Requests\UpdateOrderRequest;
use Modules\Orders\Repositories\OrderRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Orders\Entities\OrderProduct;
use Illuminate\Support\Facades\Response;
use App\Traits\FcmSend;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Modules\Caisse\Entities\Caisse;
use Modules\Charges\Entities\Charge;
use Modules\Contact\Entities\Contact;
use Modules\Payments\Entities\Payment;
use Modules\Products\Entities\Product;

class OrderAPIController extends AppBaseController
{

    use FcmSend;

    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    public function get_order_store_products(Request $request,$id)
    {

        $order = Order::find($id);

        $store_id = $order->store_id;

        $products = DB::table('store_products')
        ->where('store_products.store_id', $store_id)
        ->leftJoin('products', 'store_products.product_id', 'products.id')
        ->get();

        return Response::json([
            'success' => true,
            'data' => $products ,
            'message' => 'Topic retrieved successfully'
        ], 200);

    }



    public function get_topic(Request $request)
    {

        $topic = Config::get('app.firebase_topic');

        return Response::json([
            'success' => true,
            'data' => $topic,
            'message' => 'Topic retrieved successfully'
        ], 200);

    }




    public function get_new_orders(Request $request)
    {
        $user = Auth::user();

        $page = ($request->page - 1) * 10;

        $pages = ceil(Order::where('last_status', 'new')->count() / 10);

        $last_page = false;

        if ($request->page == $pages || $pages == 0) {
            $last_page = true;
        }


        if ($user->hasRole('operator')) {

            $new_orders = Order::where('last_status', 'new')->whereHas('users', function ($q) use ($user) {
                $q->where('assign_orders.user_id', $user->id);
            })->select(
                'id',
                'name',
                'phone',
                'store_id',
                'address',
                'wilaya',
                'discount',
                'delivery_price',
                'created_at'
            )->with('orderProducts.product')->with('store')->orderBy('created_at', 'desc')->skip($page)->limit(10)->get();

        } else {

            $new_orders = Order::where('last_status', 'new')->select(
                'id',
                'name',
                'phone',
                'store_id',
                'address',
                'wilaya',
                'discount',
                'delivery_price',
                'created_at'
            )->with('orderProducts.product')->with('users')->with('store')->orderBy('created_at', 'desc')->skip($page)->limit(10)->get();

        }

        foreach ($new_orders as $order) {

            $total = 0;

            foreach ($order->orderProducts as $op) {
                $total = $total + $op->price * $op->quantity;
            }

            $order['time'] = Carbon::now()->diffInMinutes($order->created_at);
            $order['sub_total'] = $total;
            $order['total'] = $total + $order->delivery_price - $order->discount;
        }


        return Response::json([
            'success' => true,
            'data' => $new_orders->toArray(),
            'is_last_page' => $last_page,
            'message' => 'New orders retrieved successfully'
        ], 200);
    }


    public function get_filters(Request $request)
    {

        $user = Auth::user();


        if ($request->type == 'confirmation') {

            /*   if($user->hasRole('operator')){

                   $operator_orders = Order::whereHas('users', function ($q) use ($user) {
                       $q->where('assign_orders.user_id', $user->id);
                   })->get()->pluck('id')->toArray();

   */
            //  $orders = DB::table('orders')
            /*   ->leftJoin('assign_orders','assign_orders.order_id','orders.id') */
            /*  ->whereIn('orders.id',$operator_orders)
              ->where('deleted_at',null)
              ->where('yal_tracking',null)
              ->select('last_status', DB::raw('count(*) as count'))
              ->groupBy('last_status')
              ->get();*/


            //    }else{

            $orders = DB::select('select last_status, count(*) as count
                from orders where deleted_at is null and yal_tracking is null
                group by last_status');

            //    }


        } else {


            /*   if($user->hasRole('operator')){


                   $operator_orders = Order::whereHas('users', function ($q) use ($user) {
                       $q->where('assign_orders.user_id', $user->id);
                   })->get()->pluck('id')->toArray();


                   $orders = DB::table('orders')*/
            /*   ->leftJoin('assign_orders','assign_orders.order_id','orders.id') */
            /*    ->whereIn('orders.id',$operator_orders)
                ->where('deleted_at',null)
                ->where('yal_tracking','!=',null)
                ->select('last_status', DB::raw('count(*) as count'))
                ->groupBy('last_status')
                ->get();

          }else{*/

            $orders = DB::select('select last_status, count(*) as count
                from orders where deleted_at is null and yal_tracking is not null
                group by last_status');

            //  }

        }


        return Response::json([
            'success' => true,
            'data' => $orders,
            'message' => 'orders retrieved successfully'
        ], 200);

    }


    /******** */


    public function get_orders_by_status(Request $request)
    {

        $user = Auth::user();

        $page = ($request->page - 1) * 10;

        $pages = ceil(Order::where('last_status', $request->status)->count() / 10);

        $last_page = false;

        if ($request->page == $pages || $pages == 0) {
            $last_page = true;
        }


        if ($user->hasRole('operator') && $request->status == 'new') {

            $new_orders = Order::where('last_status', $request->status)->whereHas('users', function ($q) use ($user) {
                $q->where('assign_orders.user_id', $user->id);
            })->select(
                'id',
                'name',
                'phone',
                'store_id',
                'address',
                'wilaya',
                'discount',
                'delivery_price',
                'created_at'
            )->with('orderProducts.product')->with('store')->orderBy('created_at', 'desc')->skip($page)->limit(10)->get();

        } else {

            $new_orders = Order::where('last_status', $request->status)->select(
                'id',
                'name',
                'phone',
                'store_id',
                'address',
                'wilaya',
                'discount',
                'delivery_price',
                'created_at'
            )->with('orderProducts.product')->with('users')->with('store')->orderBy('created_at', 'desc')->skip($page)->limit(10)->get();

        }

        foreach ($new_orders as $order) {

            $total = 0;

            foreach ($order->orderProducts as $op) {
                $total = $total + $op->price * $op->quantity;
            }

            $order['time'] = Carbon::now()->diffInMinutes($order->created_at);
            $order['sub_total'] = $total;
            $order['total'] = $total + $order->delivery_price - $order->discount;
        }


        return Response::json([
            'success' => true,
            'data' => $new_orders->toArray(),
            'is_last_page' => $last_page,
            'message' => 'orders retrieved successfully'
        ], 200);

    }

    /***** */


    public function get_operators()
    {

        $operators = User::role('operator')->get();

        return Response::json([
            'success' => true,
            'data' => $operators->toArray(),
            'message' => 'operators retrieved successfully'
        ], 200);


    }



    /***** */


    /***** */


    public function assign_order(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'order_id' => 'required',
            'operator_id' => 'required|string',

        ]);


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            return Response::json([
                'success' => false,
                'message' => $response
            ], 200);


        }

        foreach ($request->order_id as $order_id) {

            $order = Order::findOrfail($order_id);
            $order->users()->attach($request->operator_id);
            $order->last_status = 'new';
            $order->save();

            $operator = User::find($request->operator_id);

            $order = Order::where('id', $order_id)->with('store')->first();

            $this->push_notif_user($operator->device_token, 'New Assignd order', $order->store->name . ' has new order (' . $order_id . ')');

        }


        return Response::json([
            'success' => true,
            'message' => 'order assigned successfully'
        ], 200);


    }


    /***** */

    public function get_order_products($id)
    {

        $order_products = Order::where('id', $id)->with('orderProducts.product')->with('store')->with('mairie.yalidineWilaya')->first();

        $total = 0;

        foreach ($order_products->orderProducts as $op) {
            $total = $total + $op->price * $op->quantity;
        }

        $order_products['sub_total'] = $total;
        $order_products['total'] = $total + $order_products->delivery_price - $order_products->discount;


        return Response::json([
            'success' => true,
            'data' => $order_products->toArray(),
            'message' => 'Orders products retrieved successfully'
        ], 200);
    }

    function count()
    {

        $orders = DB::select('select last_status, count(*) as count, max(created_at) as a, max(updated_at) as b
                        from orders where deleted_at is null 
                        group by last_status');

        $contact = Contact::where('is_done',0)->count();

        $myOrders = [];
        foreach ($orders as $o) {
            $myOrders[] = [
                "status" => $this->getLastStatus($o->last_status),
                "count" => $o->count,
                "date" => $o->a >= $o->b ? $o->a : $o->b,
            ];
        }
        return Response::json([
            'success' => true,
            'data' => $myOrders,
            'contact_count' => $contact,
            'message' => 'Orders count retrieved successfully'
        ], 200);
    }


    /******** Charge api */

    public function dashborad()
    {
        /* $total_achats = DB::select('select sum(quantity * unit_price) as grand_total from bons_achats'); */

        $total_achats = DB::table('bons_achats')->where('deleted_at',null)->selectRaw('sum(quantity * unit_price) as grand_total')->get();

        $total_injection_euro_da = DB::table('caisse_euros')->where('deleted_at',null)->where('type', 'injection')->selectRaw('sum(montant * change_euro) as grand_total')->get();

        $total_achats = json_decode(json_encode($total_achats), true);
        $total_injection_euro_da = json_decode(json_encode($total_injection_euro_da), true);

        $total_charge = Charge::sum('montant') + Payment::sum('amount') + $total_achats[0]['grand_total'] + $total_injection_euro_da[0]['grand_total'];

        $total_injection = Caisse::where('type', 'injection')->sum('montant');
        $total_retrait = Caisse::where('type', 'retrait')->sum('montant');
        $total_paiement_yal = Caisse::where('type', 'paiement_yal')->sum('montant');

        $total_injection_euro = CaisseEuro::where('type', 'injection')->sum('montant');
        $total_retrait_euro = CaisseEuro::where('type', 'retrait')->sum('montant');
        $total_charge_euro = CaisseEuro::where('type', 'charges')->sum('montant');

        $count_delivered = Order::where('last_status', 'Livré')->count();
        $count_rtr = Order::where('last_status', 'Retourné au vendeur')->count();

        $total['caisse'] = $total_paiement_yal + $total_injection - $total_retrait - $total_charge;
        $total['caisse_euro'] = $total_injection_euro - $total_retrait_euro - $total_charge_euro;
        $total['retrait_yalidine'] = intval($total_paiement_yal);
        $total['injectios'] = intval($total_injection);
        $total['retraits'] = intval($total_retrait);
        $total['charges'] = intval($total_charge);
        $total['count_liv'] = $count_delivered;
        $total['count_rtr'] = $count_rtr;
        if ($count_delivered == 0 && $count_rtr == 0) {
            $total['pct_liv'] = 0;
            $total['pct_rtr'] = 0;
        } else {
            $total['pct_liv'] = $count_delivered / ($count_delivered + $count_rtr);
            $total['pct_rtr'] = $count_rtr / ($count_delivered + $count_rtr);
        }

        $orders_delivered = Order::where('last_status', 'Livré')->get();
        $total_yal = 0;

        foreach ($orders_delivered as $a) {

            foreach ($a->orderProducts as $op) {
                $total_yal = $total_yal + $op->price * $op->quantity;
            }

            $total_yal = $total_yal + $a->delivery_price - $a->discount;
        }

        $total['chiffre_yalidine'] = $total_yal;


        return Response::json([
            'success' => true,
            'data' => $total,
            'message' => 'Data retrieved successfully'
        ], 200);
    }


    /*******/


    private function getLastStatus($last_status)
    {

        switch ($last_status) {
            case "En préparation":
                return "en_p";
            case "Reçu à Wilaya":
                return "r_wilaya";
            case "Sorti en livraison":
                return "sortie";
            case "En alerte":
                return "alerte";
            case "Tentative échouée":
                return "t_echoue";
            case "En attente du client":
                return "att_c";
            case "En attente":
                return "attente";
            case "Expédié":
                return "expedie";
            case "Vers Wilaya":
                return "v_wilaya";
            case "Transfert":
                return "transfert";
            case "Centre":
                return "centre";
            case "Livré":
                return "delivered";
            case "Echèc livraison":
                return "echec";
            default:
                return $last_status;
        }
    }
}
