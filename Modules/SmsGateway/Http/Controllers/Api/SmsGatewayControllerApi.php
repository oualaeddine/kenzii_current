<?php

namespace Modules\SmsGateway\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Modules\SmsGateway\Entities\MySms;

class SmsGatewayControllerApi extends Controller
{

    public function Response_success($message , $data)
    {
        return Response::json( $data, 200);
    }

    public function Response_simple_success($message)
    {
        return "ok";
    }



    public function Response_faild($message)
    {
        return Response::json([
            'success' => false,
            'message' => $message,
        ], 400);
    }


    public function index()
    {
        return json_encode([
            [
                'id' => 1,
                'order_id' => 1337,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1337 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ], [
                'id' => 2,
                'order_id' => 1338,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1338 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ], [
                'id' => 3,
                'order_id' => 1339,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1339 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ], [
                'id' => 4,
                'order_id' => 1340,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1340 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ], [
                'id' => 5,
                'order_id' => 1341,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1341 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ], [
                'id' => 6,
                'order_id' => 1342,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1342 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ], [
                'id' => 7,
                'order_id' => 1343,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1343 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ], [
                'id' => 8,
                'order_id' => 1344,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1344 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ],

        ]);
    }

    public function pending()
    {
        return json_encode([
            [
                'id' => 1,
                'order_id' => 1337,
                'phone' => "0696689498",
                'sms' => "تم استلام طلبك رقم 1337 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop",
                'status' => "pending",
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function sms_all()
    {


       
        $get_sms_data  =  MySms::get();
        

        return $this->Response_success('sms data all retrived succssfully !' , $get_sms_data ->toArray() );

       
    }

    public function sms_pending()
    {
        $get_sms_data  =  MySms::where('status','pending')->get();
        

        return $this->Response_success('sms data pending retrived succssfully !' , $get_sms_data ->toArray() );
       
    }

    public function sms_sent()
    {

        $get_sms_data  =  MySms::where('status','sent')->get();
        

        return $this->Response_success('sms data sent retrived succssfully !' , $get_sms_data ->toArray() );
        
    }



    public function sms_failed()
    {
       
        $get_sms_data  =  MySms::where('status','failed')->get();
        

        return $this->Response_success('sms data failed retrived succssfully !' , $get_sms_data ->toArray() );
    }


    public function set_status(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'sms_id' => 'required',
            'status' => 'required|string|in:sent,pending,failed',

        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            return  $this->Response_faild($response);
        }

        $get_data = MySms::findOrFail($request->sms_id);

        $get_data->status = $request->status;
        $get_data->save();



        return $get_data;

        
    }



    public function add_sms(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:sent,pending,failed',
            'phone' => 'required|string|min:10',
            'order_id' => 'required',
            'sms' => 'required|string',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            return $this->Response_faild($response);
        }

        $new_sms = New MySms();

        $new_sms->phone = $request->phone;
        $new_sms->sms = $request->sms;
        $new_sms->order_id = $request->order_id;
        $new_sms->status = $request->status;
        $new_sms->save();


        return $this->Response_simple_success('Sms added successfully !');

        
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
        return view('smsgateway::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('smsgateway::edit');
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
