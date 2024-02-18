<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Http;

class SendToEcoManager
{

    const is_enabled = true;

    static function sendToEcoManager($name, $tel, $wilaya, $ref, $tsrc, $price)
    {
        if (self::is_enabled) {
            return Http::
            withToken('9VMrrqdgySm6R69TbZkC3CKlOxIrbha614QopCxnAh56koqtGNV0mpkyeJ5H9HzQ9qLax7x5QEC6GNl6')
                ->withBody(json_encode([
                        "name" => $name,
                        "telephone" => $tel,
                        "wilaya" => $wilaya,
                        "commune" => "a",
                        "is_confirmed" => 0,
                        "referer_url" => $tsrc,
                        "products" => [
                            [
                                "reference" => $ref,
                                "quantity" => 1,
                                "selling_price" => $price
                            ]
                        ]
                    ])
                    , "application/json"
                )
                ->accept('application/json')
                ->post('https://kenzii.ecomanager.dz/api/shop/v1/orders/create');
        } else
            return "ahchem kholso drahem";
    }

}