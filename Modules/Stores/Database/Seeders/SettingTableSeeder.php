<?php

namespace Modules\Stores\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Modules\Stores\Entities\Store_setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store_id = 1; //Config::get('app.store_id');

        Store_setting::create(['name' => 'phone', 'value' => '+21366666666','type'=>'text' , 'store_id' => $store_id]);
       

        for($i = 0; $i <= 3 ;$i++){

            // slider image
            Store_setting::create(['name' => 'slider_img', 'value' => '', 'type'=>'image' , 'store_id' => $store_id , 'group' => 'slider_'.$i , 'priorty' => $i]);

            // slider special big title 
            Store_setting::create(['name' => 'special_title', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'slider_'.$i , 'priorty' => $i]);

            // slider main title 
            Store_setting::create(['name' => 'main_title', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'slider_'.$i , 'priorty' => $i]);

            // slider second title 
            Store_setting::create(['name' => 'second_title', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'slider_'.$i , 'priorty' => $i]);

            // slider main text
            Store_setting::create(['name' => 'main_text', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'slider_'.$i , 'priorty' => $i]);

            // slider main text
            Store_setting::create(['name' => 'second_text', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'slider_'.$i , 'priorty' => $i]);

            // slider product link
            Store_setting::create(['name' => 'product_link', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'slider_'.$i , 'priorty' => $i]);

            
        }

        // trend section values 
        Store_setting::create(['name' => 'trend_title', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'trend']);
        Store_setting::create(['name' => 'trend_second_title', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'trend']);
        Store_setting::create(['name' => 'trend_text', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'trend']);
        Store_setting::create(['name' => 'trend_img_1', 'value' => '', 'type'=>'image' , 'store_id' => $store_id , 'group' => 'trend']);
        Store_setting::create(['name' => 'trend_img_2', 'value' => '', 'type'=>'image' , 'store_id' => $store_id , 'group' => 'trend']);
        Store_setting::create(['name' => 'trend_product', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'trend']);



        
        // socail links 
        Store_setting::create(['name' => 'fb_link', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'social']);
        Store_setting::create(['name' => 'ig_link', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'social']);
        Store_setting::create(['name' => 'tw_link', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'social']);


        for($i = 0; $i <= 4 ;$i++){

            // about links
            Store_setting::create(['name' => 'Nous contacter_'.$i, 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'about_links' , 'priorty' => $i]);

        }


        Store_setting::create(['name' => 'email', 'value' => '', 'type'=>'text' , 'store_id' => $store_id , 'group' => 'email']);

    }
}
