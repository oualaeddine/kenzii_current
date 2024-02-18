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

class OrderStatusController extends Controller
{
    
    /**
     * Display a listing of the Order.
     *

     */

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'last_status' => 'required|string',
        ]);

        if ($validator->fails()) {

            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error',$response);

            return redirect()->back();
        }


        $order = Order::findOrfail($id);
        $order->last_status = $request->last_status;
        $order->save();

        Session::flash('success','your order updated successfully');

        return redirect()->back();
    }


}
