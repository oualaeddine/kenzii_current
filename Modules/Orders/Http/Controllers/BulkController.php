<?php

namespace Modules\Orders\Http\Controllers;

use App\Events\OrderStatus;
use App\Models\User;
use App\Traits\FcmSend;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Orders\Entities\Order;
use Throwable;

class BulkController extends Controller
{
    use FcmSend;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function assign(Request $request)
    {
       
       $validator = Validator::make($request->all(), [

        'orders' => 'required',
        'operator_id' => 'required|string',

       ],['operator_id.required' => 'please select operator !']);

  
            if ($validator->fails()) {
                $response = array($validator->messages());
                $response = $response[0]->first();

                
                    Session::flash('error', $response);

                    return redirect()->back()->with('error', $response);

            }

            $array_orders =  explode(',',$request->orders);

                foreach ($array_orders as $order_id) {


                    $order = Order::findOrfail($order_id);

                    

                    if($order->last_status != 'new'){

                        Session::flash('error', 'select only new orders please !');

                        return redirect()->back()->with('error', 'select only new orders please !');

                    }

                    DB::beginTransaction();

                    try{

                    $order->users()->attach($request->operator_id);
                    $order->last_status = 'new';
                    $order->save();

                    $operator = User::find($request->operator_id);

                    $order = Order::where('id', $order_id)->with('store')->first();

            
                   // $this->push_notif_user($operator->device_token, 'New Assignd order', $order->store->name . ' has new order (' . $order_id . ')');

                    }catch(Throwable $e){

                        DB::rollback();

                        return redirect()->back()->with('error', 'something went wrong please try again !');
                    }

                }

                DB::commit();

                Session::flash('success','orders assigned successfully');

                return redirect()->back();

    }

    public function en_p(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders' => 'required',
           ]);

           if ($validator->fails()) {
               $response = array($validator->messages());
               $response = $response[0]->first();

               
                   Session::flash('error', $response);

                   return redirect()->back()->with('error', $response);

           }

           $array_orders =  explode(',',$request->orders);


           foreach ($array_orders as $order_id) {

            $order = Order::findOrfail($order_id);

            
            if($order->last_status == 'confirmed2' || $order->last_status == 'pending_s'){

                $order->last_status = 'en_p';
                /* $order->last_status = 'Assigned'; */
                $order->save();
           

                OrderStatus::dispatch($order);

            }else{

                Session::flash('error', 'select only confirmed2 ou pending_s orders please !');

                return redirect()->back()->with('error', 'select only confirmed2 orders please !');

            }

          

        }


        Session::flash('success','orders status changed successfully');

        return redirect()->back();


    }

    public function cancel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders' => 'required',
           ]);

           if ($validator->fails()) {
               $response = array($validator->messages());
               $response = $response[0]->first();

               
                   Session::flash('error', $response);

                   return redirect()->back()->with('error', $response);

           }

           $array_orders =  explode(',',$request->orders);


           foreach ($array_orders as $order_id) {

            $order = Order::findOrfail($order_id);

            if($order->last_status == 'en_p'){

                Session::flash('error', 'select only not en préparation orders please !');

                return redirect()->back()->with('error', 'select only not en préparation orders please !');

            }

            $order->last_status = 'canceled';
            /* $order->last_status = 'Assigned'; */
            $order->save();

        }


        Session::flash('success','orders status changed successfully');

        return redirect()->back();
    }

    public function archive(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders' => 'required',
           ]);

           if ($validator->fails()) {
               $response = array($validator->messages());
               $response = $response[0]->first();

               
                   Session::flash('error', $response);

                   return redirect()->back()->with('error', $response);

           }

           $array_orders =  explode(',',$request->orders);


           foreach ($array_orders as $order_id) {

                    $order = Order::findOrfail($order_id);

                    $order->delete();


            }


           Session::flash('success','orders archived successfully');

           return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('orders::create');
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
