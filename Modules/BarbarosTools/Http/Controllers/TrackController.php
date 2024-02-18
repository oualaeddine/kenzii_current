<?php

namespace Modules\BarbarosTools\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Modules\Orders\Entities\Order;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('barbarostools::pages.track')->with('page_title', 'تتبع الطلبية');

    }


    public function get_arabic_name($status){

        switch ($status) {
            case "new":
                $act_status =  "جديد";
                $message =  "تم تسجيل طلبك بنجاح سوف يتم الإتصال بك لتأكيد الطلب";
                break;

            case "na1":
                $act_status =  "لا إستجابة 1";
                $message =  "يرجى الرد على الهاتف لتأكيد طلبك";
                break;

            case "na2":

                $act_status =  "لا إستجابة 2";
                $message =  "يرجى الرد على الهاتف لتأكيد طلبك";
                break;

            case "AttConfNa1":
                $act_status =  "لا إستجابة 1";
                $message =  "يرجى الرد على الهاتف لتأكيد طلبك";
                break;

            case "AttConfNa2":
                $act_status =  "لا إستجابة 2";
                $message =  "يرجى الرد على الهاتف لتأكيد طلبك";
                break;

                
            case "Conf1Na1":
                $act_status =  "لا إستجابة 1";
                $message =  "يرجى الرد على الهاتف لتأكيد طلبك";
                break;


            case "Conf1Na2":
                $act_status =  "لا إستجابة 2";
                $message =  "يرجى الرد على الهاتف لتأكيد طلبك";
                break;

                
            case "AttShippNa1":
                $act_status =  "لا إستجابة 1";
                $message =  "يرجى الرد على الهاتف لتأكيد طلبك";
                break;

                
            case "AttShippNa2":
                $act_status =  "لا إستجابة 2";
                $message =  "يرجى الرد على الهاتف لتأكيد طلبك";
                break;

            case "canceled":

                $act_status =  "ألغيت";
                $message =  "تم إلغاء طلبك";
                break;


            case "confirmed1":

                $act_status =  "تم تأكيد طلبك 1";
                $message =  "تم تأكيد طلبك";
                break;

            case "Expédié":

                $act_status =  "شحن";
                $message =  "تم شحن طلبك";
                break;

            case "Reçu à Wilaya":

                $act_status =  "وصول للولاية";
                $message =  "تم إيصال طلبك لولايتك";
                break;

            case "Sorti en livraison":

                $act_status =  "خروج للتوصيل";
                $message =  "عامل التسيلم في طريقه لتسليم الطرد الخاص بك";
                break;

            case "Echèc livraison":

                $act_status =  "خطأ في التوصيل";
                $message =  "فشلت عملية توصيل طلبك";
                break;


            case "Livré":

                $act_status =  "تم التسليم";
                $message =  "تم تسليم الطلب بنجاح";
                break;

            case "en_p":

                $act_status =  "قيد التحضير";
                $message =  "طلبك تحت عملية التجهيز للتوصيل";
                break;

            case "attente":

                $act_status =  "إنتظار";
                $message =  "تم تجهيز الطلبية في إنتظار ردك للتوصيله ";
                break;

            case "att_c":

                $act_status =  "إنتظار التأكيد";
                $message =  "في إنتظار ردك لتأكيد الطلب";
                break;

            case "t_echoue":

                $act_status =  "محاولة توصيل فاشلة";
                $message =  "فشل في توصيل الطلبية  ";
                break;

            case "alerte":

                $act_status =  "إنذار";
                $message =  "تم تجهيز الطلب";
                break;

            case "sortie":

                $act_status =  "خروج للتوصيل";
                $message =  "خروج الطلبية للتوصيل ";
                break;

            case "r_wilaya":

                $act_status =  "وصول للولاية";
                $message =  "تم توصيل الطلبية إلى ولايتك";
                break;

            case "rs":

                $act_status =  "جاهز للولاية ";
                $message =  "تم تجهيز طلبيتك للتوصيل إلى الولاية ";
                break;

            case "confirmed2":

                $act_status =  "تم التأكيد 2";
                $message =  "تم تأكيد طلبيتك";
                break;

            case "pending_s":

                $act_status =  "إنتظار شحن";
                $message =  "طلبيتك قيد إنتظار عملية الشحن";
                break;

            case "pending_c":

                $act_status =  "إنتظار تأكيد";
                $message =  "في إنتظار تأكيد طلبيتك";
                break;


            default:

            $act_status =  $status;
            $message =  "طلبيتلك في حالة خاصة ";
        }

      return $act_status;

    }

    public function show(Request $request)
    {

        $order = Order::where('id',$request->order)->with('order_history')->first();

        if($order != null){
            $last_status = $this->get_arabic_name($order->last_status);
        }else{
            $last_status = null;
        }
        

        return view('barbarostools::pages.track_show',compact('order','last_status'))->with('page_title', 'تتبع الطلبية');

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function get_order(Request $request)
    {

        $order = Order::where('id',$request->order)->first();

        if($order != null){
        
            $message = ' يتم العمل عليها ';

        }else{

            $message = 'لا يوجد طلب بهذا الرقم نعتذر';
        }


        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
  
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
