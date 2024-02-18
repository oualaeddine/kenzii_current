<?php
namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
use FacebookAds\Object\ServerSide\ActionSource;
use FacebookAds\Object\ServerSide\Content;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Object\ServerSide\DeliveryCategory;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\UserData;


trait FbSavePoint
{

/*
 * view content { fbc, fbp, ip, user agent, EventSourceUrl }
 * initiateCheckout {  fbc, fbp, ip, user agent, EventSourceUrl }
 * purchase { fbc, fbp, ip, user agent, EventSourceUrl, price, product id, quantity, phone, city  }
 *
 * */
    function saveEvent()
    {
        $access_token = 'EAAFdzcpG91kBAEpQPQN9U1xYiFO9q0ZAd6NzMh9ZAw9F6VkQM6kRrqj8IpoIH2cSoMXuE3H5Pf5Mnt4qyhW3KZAZCFaYkfszj4ZAf5n98NVjhZBI4t4bZACfN517RqxAxFdTV1ZAzIfDXzzG9ZCKDRc2C1fv6O4qzcsiC04Lx0tv8c4nu6lpJMuI7';
        $pixel_id = '742865556560352';

        $api = Api::init(null, null, $access_token);
        $api->setLogger(new CurlLogger());

        $user_data = (new UserData())
            ->setEmails(array('joe@eg.com'))
            ->setPhones(array('12345678901', '14251234567'))
            // It is recommended to send Client IP and User Agent for Conversions API Events.
            ->setClientIpAddress($_SERVER['REMOTE_ADDR'])
            ->setClientUserAgent($_SERVER['HTTP_USER_AGENT'])
            ->setFbc('fb.1.1554763741205.AbCdEfGhIjKlMnOpQrStUvWxYz1234567890')
            ->setFbp('fb.1.1558571054389.1098115397');

        $content = (new Content())
            ->setProductId('product123')
            ->setQuantity(1)
            ->setDeliveryCategory(DeliveryCategory::HOME_DELIVERY);

        $custom_data = (new CustomData())
            ->setContents(array($content))
            ->setCurrency('dzd')
            ->setValue(123.45);

        $event = (new Event())
            ->setEventName('Purchase')
            ->setEventTime(time())
            ->setEventSourceUrl('http://jaspers-market.com/product/123')
            ->setUserData($user_data)
            ->setCustomData($custom_data)
            ->setActionSource(ActionSource::WEBSITE);

        $events = array();
        array_push($events, $event);

        $request = (new EventRequest($pixel_id))
            ->setEvents($events);
        $response = $request->execute();
        print_r($response);
    }



    public function push_event_p(Request $request,$data) {

        $client = new \GuzzleHttp\Client();
        $url   = " https://graph.facebook.com/v11.0/$data->fb_pixel/events";
        $data   = array (  'data=[
            {
              "event_name": "Purchase",
              "event_time": 1631567077,
              "user_data": {
                "em": [
                  "309a0a5c3e211326ae75ca18196d301a9bdbd1a882a4d2569511033da23f0abd"
                ],
                "ph": [
                  "254aa248acb47dd654ca3ea53f48c2c26d641d23d7e2e93a1ec56258df7674c4",
                  "6f4fcb9deaeadc8f9746ae76d97ce1239e98b404efe5da3ee0b7149740f89ad6"
                ],
                "client_ip_address": "123.123.123.123",
                "client_user_agent": "$CLIENT_USER_AGENT",
                "fbc": "fb.1.1554763741205.AbCdEfGhIjKlMnOpQrStUvWxYz1234567890",
                "fbp": "fb.1.1558571054389.1098115397"
              },
              "contents": [
                {
                  "id": "product123",
                  "quantity": 1,
                  "delivery_category": "home_delivery"
                }
              ],
              "custom_data": {
                "currency": "usd",
                "value": 123.45
              },
              "event_source_url": "http://jaspers-market.com/product/123",
              "action_source": "website"
            }
          ]' );


      

        $requestAPI = $client->post( $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
                'body' => json_encode($data),
            ]);

            $res = json_decode($requestAPI->getBody(), true);


        return $res;

    }


    
    public function push_event_a(Request $request,$data) {

        $client = new \GuzzleHttp\Client();
        $url   = " https://graph.facebook.com/v11.0/$data->fb_pixel/events";
        $data   = array (/* "data": [
            {
               "event_name": "ViewContent",
               "event_time": 1631566477,
               "event_id": "event.id.123",
               "event_source_url": "http:\/\/jaspers-market.com",
               "user_data": {
                  "client_ip_address": "1.2.3.4",
                  "client_user_agent": "test user agent"
               }
            }
         ], */);

        $requestAPI = $client->post( $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
                'body' => json_encode($data),
            ]);

            $res = json_decode($requestAPI->getBody(), true);


        return $res;

    }


    
    public function push_event_i(Request $request,$data) {

        $client = new \GuzzleHttp\Client();
        $url   = " https://graph.facebook.com/v11.0/$data->fb_pixel/events";
        $data   = array (/* "data": [
            {
               "event_name": "ViewContent",
               "event_time": 1631566477,
               "event_id": "event.id.123",
               "event_source_url": "http:\/\/jaspers-market.com",
               "user_data": {
                  "client_ip_address": "1.2.3.4",
                  "client_user_agent": "test user agent"
               }
            }
         ], */);

        $requestAPI = $client->post( $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
            ],
                'body' => json_encode($data),
            ]);

            $res = json_decode($requestAPI->getBody(), true);


        return $res;

    }






}
