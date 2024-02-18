<?php

namespace App\Listeners;

use App\Events\OrderStatus;
use App\Helpers\SmsHelper;
use App\Helpers\YalidineHttpHelper;
use App\Models\User;
use App\Notifications\NewOrder;
use App\Notifications\OrderAssigned;
use App\Traits\FcmSend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Modules\Log\Entities\Log;
use Modules\Orders\Entities\Order;
use Modules\Orders\Entities\OrderHistory;

use function PHPUnit\Framework\returnSelf;

class ChangeStatus
{
    use FcmSend;

    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct(OrderStatus $event)
    {
    }

    public function store_message($status,$order_id)
    {

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

        $order_history = new OrderHistory();
        $order_history->message = $message;
        $order_history->order_id = $order_id;
        $order_history->status = $act_status;
        $order_history->save();


    }

    /**
     * Handle the event.
     * @param OrderStatus $event
     * @return void
     */

    public function handle(OrderStatus $event)
    {
        $order = $event->order;

        $this->store_message($order->last_status,$order->id);

        
        if ($order->last_status == "en_p") {
            $result = YalidineHttpHelper::createParcel($order);
            $order->yal_tracking = $result->json()[$order->id]['tracking'];
            $order->save();
        }

        if (
            $order->last_status == "Livré"
            || $order->last_status == "en alerte"
            || $order->last_status == "tentative echoué"
            || $order->last_status == "recu a wilaya"
            || $order->last_status == "sortie en livraison"
        ) {

            $order_id = $order->id;

            $order = Order::where('id', $order_id)->with('store')->first();

            $operators = User::role('operator')->get();

            foreach ($operators as $operator) {
                $this->push_notif_user(
                    $operator->device_token,
                    'New Assignd order',
                    $order->store->name . ' has changed status for (' . $order_id . ') to ' . $order->last_status
                );
            }
        }

        SmsHelper::sendChangeStatusSms($order);
    }
}
