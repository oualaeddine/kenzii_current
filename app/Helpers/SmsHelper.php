<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Http;
use Modules\Orders\Entities\Order;
use Modules\SmsGateway\Entities\MySms;
use Modules\SmsGateway\Entities\Sms_setting;

class SmsHelper
{
    const is_enabled = false;

    static function sendSms($sms, $num)
    {
        if (self::is_enabled) {
            return Http::
            withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijc4NDUwZWFmODUyYzYyMDgxZjdiYmQ1NzRhMGE4M2FkYTFkYWYzNDgwODAyZTJjOTY0M2Y5MTQ1M2UyNTYyZGFiMDdlOTExNTUzZTRkNzJkIn0.eyJhdWQiOiIxIiwianRpIjoiNzg0NTBlYWY4NTJjNjIwODFmN2JiZDU3NGEwYTgzYWRhMWRhZjM0ODA4MDJlMmM5NjQzZjkxNDUzZTI1NjJkYWIwN2U5MTE1NTNlNGQ3MmQiLCJpYXQiOjE2MjQ5MTc1NDgsIm5iZiI6MTYyNDkxNzU0OCwiZXhwIjoxOTQwNDUwMzQ4LCJzdWIiOiI4NiIsInNjb3BlcyI6W119.AQYqGFUq2fytDJSRzAoskRCVbhDspwugW5C5gE9gS7Jbf68MZnBlkKf5PcDDwa_ziVSH2G0wkF2H8183k13fft0Us07XqURRwsNZj62ajOYYKoNvpdVWsSaBEWGmqoDTDjOBbMyrUQZIqL0f_y9t5JJ_Bp9myTaHWTTWWW4MAUlJlKgplHO7_rSkx2xZOwv4IkBIRm3Trukzscqi4w2CfiVSjSyS6Ez9raEmUjCZgrtgDlnzlWNIP5yd5LAdre15dNi5PBbL8xCWDOw4lY9hSqlPTcPYdT8pe239EMOq67b6uGCdw82LQ6DQ8j5eqdAL9GSaQF7ZXbhi41t63s_p_5nxA3MGOMlgROFcki5ihlsZaFQFcj2Pm0fhQtEQo3M4whqEh8OpeC7rf0HqZ3YPikiEvTKCvij2z0y6jlI6PDalp5lI1pp8wFY4r2MV52RGDCvExMAuZAuSsa2Z66PODBw7XAVJ5NuxIXCzDJVgW03T2iJX0bIEexYp7CrmX_ERACToIupJ14E_BoAVrnNLqvIVT5nV9-zJOC-5qRDdjvi32q_Rkh260uZWgPPP7lSTxf8d4Hkkum06ATH7lQjlHwAEfTr93JLKt73DSqSiJ6Rq0FEspA9Wz3LJNst2WjMUDGHdfmGVbWT5MDJ0T7LRTLN7pHBRFdGrYtLwZOltzcs')
                ->withBody(json_encode([
                        "flag" => 52,
                        "to" => $num,
                        "message" => $sms
                    ])
                    , "application/json"
                )
                ->accept('application/json')
                ->post('https://dz-sms.com/api/send/sms');
        } else
            return "ahchem kholso drahem";
    }

    public static function sendChangeStatusSms(Order $order)
    {
        $status = $order->last_status;
        $sms = "";

        $get_sms = Sms_setting::where('is_active',true)->where('status',$status)->first();


        if($get_sms != null){
            
            $text = str_replace("{{order}}",$order->id,$get_sms->text);

            $sms = $text.".\n" . $order->store->fb;
        }else{

            return false;
            
        }
    

     /*    switch ($status) {
            case "new":
                $sms = "تم استلام طلبك رقم $order->id سنتصل بك للتأكيد.\n" . $order->store->fb;
                break;
            case "na2":
            case "na1":
                $sms = "يرجى الرد على الهاتف لتأكيد طلبك رقم $order->id \n" . $order->store->fb;
                break;
            case "canceled":
                $sms = "تم إلغاء طلبك رقم $order->id \n" . $order->store->fb;
                break;
            case "confirmed1":
                $sms = "تم تأكيد طلبك رقم $order->id \n" . $order->store->fb;
                break;
            case "Expédié":
                $sms = "تم ارسال طلبك رقم $order->id \n" . $order->store->fb;
                break;
            case "Reçu à Wilaya":
                $sms = "وصل طلبك  رقم $order->id إلى ولايتك \n" . $order->store->fb;
                break;
            case "Sorti en livraison":
                $sms = "عامل التسلم في طريقه لتسليم الطرد الخاص بك \n" . $order->store->fb;
                break;
            case "Echèc livraison":
                $sms = "لقد فشلت عملية تسليم طلبك رقم $order->id \n" . $order->store->fb;
                break;
            case "Livré":
                $sms = "لقد تم تسليم طلبك رقم $order->id \n" . $order->store->fb;
                break;

                default :return false;

        } */

        return self::saveSms($sms, $order->phone, $order->id);
    }

    static function saveSms($sms, $num, $order_id)
    {
        if(strlen($sms) < 160){
            $mySms = new MySms();
            $mySms->sms = $sms;
            $mySms->phone = $num;
            $mySms->order_id = $order_id;
            $mySms->save();
        }else{

            $count = floor(strlen($sms) / 159) + 1;

            $parts = str_split($sms,159);


            foreach($parts as $part){

                $mySms = new MySms();
                $mySms->sms = $part;
                $mySms->phone = $num;
                $mySms->order_id = $order_id;
                $mySms->save();

            }

        }
     
        return true;
    }

}