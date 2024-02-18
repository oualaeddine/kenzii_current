<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

trait FcmSend
{


    public function push_notif(Request $request,$order_id,$store_name) {

        $client = new \GuzzleHttp\Client();
        $url   = "https://fcm.googleapis.com/fcm/send";
        $data   = array (
            'to' => Config::get('app.firebase_topic'),
            'collapse_key' => 'type_a',

            'data' => 
            array (
              'title' => 'New Order',
              'body' => $store_name.' has new order ('.$order_id.')',
              'sound' => 'alert',
            ),
        );
        $requestAPI = $client->post( $url, [
            'headers' => [
                'Authorization' => 'key=AAAAcFew-TI:APA91bEU5Z_gpHeok5HmZUjLWk--1gr_iNRW_rynV-P_cl_924FwRTZkFSrgtQnnN5Hqfg-krRfGrPUFA0nO5DaO8-l2Jpwv2ss2r97bqSj2HZWlN97tUnBnzzsQd_0uevqllogfeohK',
                'Content-Type'  => 'application/json',
            ],
                'body' => json_encode($data),
            ]);

            $res = json_decode($requestAPI->getBody(), true);


        return $res;

    }


    
    public function push_notif_user($device_token,$title,$message) {

        $client = new \GuzzleHttp\Client();
        $url   = "https://fcm.googleapis.com/fcm/send";
        $data   = array (
            'to' => $device_token,
            'collapse_key' => 'type_a',

            'data' => 
            array (
              'title' => $title,
              'body' => $message,
              'sound' => 'alert',
            ),
        );
        $requestAPI = $client->post( $url, [
            'headers' => [
                'Authorization' => 'key=AAAAcFew-TI:APA91bEU5Z_gpHeok5HmZUjLWk--1gr_iNRW_rynV-P_cl_924FwRTZkFSrgtQnnN5Hqfg-krRfGrPUFA0nO5DaO8-l2Jpwv2ss2r97bqSj2HZWlN97tUnBnzzsQd_0uevqllogfeohK',
                'Content-Type'  => 'application/json',
            ],
                'body' => json_encode($data),
            ]);

            $res = json_decode($requestAPI->getBody(), true);


        return $res;

    }


}
