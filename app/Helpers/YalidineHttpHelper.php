<?php


namespace App\Helpers;


use App\Events\OrderStatus;
use Illuminate\Support\Facades\Http;
use Modules\Orders\Entities\Order;

class YalidineHttpHelper
{

    static function updateParcelsInDb()
    {
        $orders = Order::all()->where('yal_tracking', '!=', null)
            ->where('last_status', '!=', 'Livré')
            ->where('last_status', '!=', ' Retourné au vendeur');


        $tracking = "";
        foreach ($orders as $order)
            $tracking = $tracking . $order->yal_tracking . ",";
        $tracking = substr($tracking, 0, -1);

        $result = YalidineHttpHelper::yalidineHttpGetRequest("parcels/?tracking=$tracking")->json();
        $data = $result['data'];

        foreach ($data as $item) {
            $ord = Order::where('yal_tracking', '=', $item['tracking'])->first();

            // check if status changed
            if ($ord->last_status != $item['last_status']) {
                $ord->last_status = $item['last_status'];
                $ord->save();
                OrderStatus::dispatch($ord);
            }
        }
        return "Sync completed";
    }


    static function createParcel(Order $order)
    {
        $price = 0;

        $orderProducts = $order->orderProducts;

        foreach ($orderProducts as $orderProduct) {
            $price = $price + $orderProduct->price * $orderProduct->quantity;
        }
        $price = $price + $order->delivery_price - $order->discount;
        $data =
            array( // the array that contains all the parcels
                array( // first parcel
                    "order_id" => $order->id,
                    "firstname" => " ",
                    "familyname" => $order->name,
                    "contact_phone" => $order->phone,
                    "address" => $order->address,
                    "to_commune_name" => $order->mairie()->first()->name,
                    "to_wilaya_name" => $order->mairie()->first()->yalidineWilaya()->first()->name,
                    "product_list" => $order->orderProducts()->first()->product()->first()->name,
                    "price" => $price,
                    "freeshipping" => true,
                    "is_stopdesk" => false,//todo $order->is_stopdesk,
                    "has_exchange" => 0,
                    "product_to_collect" => null
                )
            );


        return Http::withHeaders([
            'X-API-ID' => config("app.yalidine_id"),
            'X-API-TOKEN' => config("app.yalidine_token")
        ])
            ->accept('application/json')
            ->withBody(json_encode($data), 'application/json')
            ->post('https://api.yalidine.app/v1/parcels');
    }

    static function getParcelsByStatus($status)
    {

    }

    static function countParcelsByStatus($status)
    {

    }

    static function getParcelByOrderId($id)
    {

    }

    static function getParcelByYal($yal)
    {
        return YalidineHttpHelper::yalidineHttpGetRequest("parcels/$yal");
    }

    static function getParcelHistoryByYal($yal)
    {
        return YalidineHttpHelper::yalidineHttpGetRequest("histories/$yal");
    }

    static function yalidineHttpGetRequest($urlWithParams)
    {
        return Http::withHeaders([
            'X-API-ID' => config("app.yalidine_id"),
            'X-API-TOKEN' => config("app.yalidine_token")
        ])
            ->get('https://api.yalidine.app/v1/' . $urlWithParams);

    }
}