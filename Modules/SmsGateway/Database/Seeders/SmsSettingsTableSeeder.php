<?php

namespace Modules\SmsGateway\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\SmsGateway\Entities\Sms_setting;

class SmsSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sms_setting = new Sms_setting();
        $sms_setting->sms = "تم استلام طلبك رقم كذا سنتصل بك للتأكيد";
        $sms_setting->status = "new";
        $sms_setting->is_active = true;
        $sms_setting->save();

        //

        $sms_setting = new Sms_setting();
        $sms_setting->sms = "يرجى الرد على الهاتف لتأكيد طلبك رقم ";
        $sms_setting->status = "na1";
        $sms_setting->is_active = true;
        $sms_setting->save();

        //

        $sms_setting = new Sms_setting();
        $sms_setting->sms = "يرجى الرد على الهاتف لتأكيد طلبك رقم ";
        $sms_setting->status = "na2";
        $sms_setting->is_active = true;
        $sms_setting->save();

        //

        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "يرجى الرد على الهاتف لتأكيد طلبك رقم {{order}}";
        $sms_setting->status = "AttConfNa1";
        $sms_setting->is_active = true;
        $sms_setting->save();
    
         //
    
         $sms_setting = new Sms_setting();
         $sms_setting->text = "يرجى الرد على الهاتف لتأكيد طلبك رقم {{order}}";
         $sms_setting->status = "AttConfNa2";
         $sms_setting->is_active = true;
         $sms_setting->save();
    
          //
    
        $sms_setting = new Sms_setting();
        $sms_setting->text = "يرجى الرد على الهاتف لتأكيد طلبك رقم {{order}}";
        $sms_setting->status = "Conf1Na1";
        $sms_setting->is_active = true;
        $sms_setting->save();
    
         //
    
         $sms_setting = new Sms_setting();
         $sms_setting->text = "يرجى الرد على الهاتف لتأكيد طلبك رقم {{order}}";
         $sms_setting->status = "Conf1Na2";
         $sms_setting->is_active = true;
         $sms_setting->save();
    
          //
    
        $sms_setting = new Sms_setting();
        $sms_setting->text = "يرجى الرد على الهاتف لتأكيد طلبك رقم {{order}}";
        $sms_setting->status = "AttShippNa1";
        $sms_setting->is_active = true;
        $sms_setting->save();
    
         //
    
         $sms_setting = new Sms_setting();
         $sms_setting->text = "يرجى الرد على الهاتف لتأكيد طلبك رقم {{order}}";
         $sms_setting->status = "AttShippNa2";
         $sms_setting->is_active = true;
         $sms_setting->save();
    
            
        //

        $sms_setting = new Sms_setting();
        $sms_setting->sms = "تم إلغاء طلبك رقم";
        $sms_setting->status = "canceled";
        $sms_setting->is_active = true;
        $sms_setting->save();


           //

           $sms_setting = new Sms_setting();
           $sms_setting->sms = "تم تأكيد طلبك رقم";
           $sms_setting->status = "confirmed1";
           $sms_setting->is_active = true;
           $sms_setting->save();


               //

               $sms_setting = new Sms_setting();
               $sms_setting->sms = "تم ارسال طلبك رقم ";
               $sms_setting->status = "Expédié";
               $sms_setting->is_active = true;
               $sms_setting->save();


                   //

                   $sms_setting = new Sms_setting();
                   $sms_setting->sms = "وصل طلبك  رقم";
                   $sms_setting->status = "Reçu à Wilaya";
                   $sms_setting->is_active = true;
                   $sms_setting->save();
    


                        //

                        $sms_setting = new Sms_setting();
                        $sms_setting->sms = "عامل التسلم في طريقه لتسليم الطرد الخاص بك";
                        $sms_setting->status = "Sorti en livraison";
                        $sms_setting->is_active = true;
                        $sms_setting->save();


                         //

                         $sms_setting = new Sms_setting();
                         $sms_setting->sms = "لقد فشلت عملية تسليم طلبك رقم ";
                         $sms_setting->status = "Echèc livraison";
                         $sms_setting->is_active = true;
                         $sms_setting->save();


                                     //

                                     $sms_setting = new Sms_setting();
                                     $sms_setting->sms = "لقد تم تسليم طلبك رقم ";
                                     $sms_setting->status = "Livré";
                                     $sms_setting->is_active = true;
                                     $sms_setting->save();

        
    }
}
