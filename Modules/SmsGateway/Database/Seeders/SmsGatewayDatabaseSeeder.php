<?php

namespace Modules\SmsGateway\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\SmsGateway\Entities\Sms_setting;

class SmsGatewayDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sms_setting::truncate();

        $sms_setting = new Sms_setting();
        $sms_setting->text = "تم استلام طلبك رقم {{order}} سنتصل بك للتأكيد";
        $sms_setting->status = "new";
        $sms_setting->is_active = true;
        $sms_setting->save();

        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "يرجى الرد على الهاتف لتأكيد طلبك رقم {{order}}";
        $sms_setting->status = "na1";
        $sms_setting->is_active = true;
        $sms_setting->save();

        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "يرجى الرد على الهاتف لتأكيد طلبك رقم {{order}}";
        $sms_setting->status = "na2";
        $sms_setting->is_active = true;
        $sms_setting->save();

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
        $sms_setting->text = "تم إلغاء طلبك رقم {{order}}";
        $sms_setting->status = "canceled";
        $sms_setting->is_active = true;
        $sms_setting->save();


        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "تم تأكيد طلبك رقم {{order}}";
        $sms_setting->status = "confirmed1";
        $sms_setting->is_active = true;
        $sms_setting->save();


        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "تم ارسال طلبك رقم {{order}}";
        $sms_setting->status = "Expédié";
        $sms_setting->is_active = true;
        $sms_setting->save();


        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "وصل طلبك  رقم {{order}}";
        $sms_setting->status = "Reçu à Wilaya";
        $sms_setting->is_active = true;
        $sms_setting->save();



        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "عامل التسلم في طريقه لتسليم الطرد الخاص بك";
        $sms_setting->status = "Sorti en livraison";
        $sms_setting->is_active = true;
        $sms_setting->save();


        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "لقد فشلت عملية تسليم طلبك رقم {{order}}";
        $sms_setting->status = "Echèc livraison";
        $sms_setting->is_active = true;
        $sms_setting->save();


        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "لقد تم تسليم طلبك رقم  {{order}}";
        $sms_setting->status = "Livré";
        $sms_setting->is_active = true;
        $sms_setting->save();



        ///new  statuss



        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "طلبك رقم {{order}} قيد التحضير";
        $sms_setting->status = "en_p";
        $sms_setting->is_active = false;
        $sms_setting->save();
        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "تم تجهيز طلبك رقم {{order}} في إنتظار ردك لتوصيله ";
        $sms_setting->status = "attente";
        $sms_setting->is_active = false;
        $sms_setting->save();

        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "طلبك رقم {{order}} في إنتظار ردك";
        $sms_setting->status = "att_c";
        $sms_setting->is_active = false;
        $sms_setting->save();


        
        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "محاولة توصيل فاشلة لطلب رقم {{order}} ";
        $sms_setting->status = "t_echoue";
        $sms_setting->is_active = false;
        $sms_setting->save();


        
        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "تم تجهيز الطلب رقم {{order}}";
        $sms_setting->status = "alerte";
        $sms_setting->is_active = false;
        $sms_setting->save();

        //

        $sms_setting = new Sms_setting();
        $sms_setting->text = "خروج الطلب رقم {{order}} للتوصيل";
        $sms_setting->status = "sortie";
        $sms_setting->is_active = false;
        $sms_setting->save();


          //

          $sms_setting = new Sms_setting();
          $sms_setting->text = "وصول طلبك رقم {{order}} إلى ولايتك";
          $sms_setting->status = "r_wilaya";
          $sms_setting->is_active = false;
          $sms_setting->save();


          
          //

          $sms_setting = new Sms_setting();
          $sms_setting->text = "تم تجهيز الطلب رقم {{order}} للتوصيل إلى الولاية";
          $sms_setting->status = "rs";
          $sms_setting->is_active = false;
          $sms_setting->save();


           //

           $sms_setting = new Sms_setting();
           $sms_setting->text = "تم تجهيز الطلب رقم {{order}} للتوصيل إلى الولاية";
           $sms_setting->status = "rs";
           $sms_setting->is_active = false;
           $sms_setting->save();
           

            //

           $sms_setting = new Sms_setting();
           $sms_setting->text = "تم تأكيد طلبك رقم {{order}}";
           $sms_setting->status = "confirmed2";
           $sms_setting->is_active = false;
           $sms_setting->save();


           
            //

            $sms_setting = new Sms_setting();
            $sms_setting->text = "الطلب رقم {{order}} في الإنتظار للشحن";
            $sms_setting->status = "pending_s";
            $sms_setting->is_active = false;
            $sms_setting->save();

               //

               $sms_setting = new Sms_setting();
               $sms_setting->text = "الطلب رقم {{order}} في الإنتظار للشحن";
               $sms_setting->status = "pending_s";
               $sms_setting->is_active = false;
               $sms_setting->save();


               
               //

               $sms_setting = new Sms_setting();
               $sms_setting->text = "الطلب رقم {{order}} في الإنتظار التأكيد";
               $sms_setting->status = "pending_c";
               $sms_setting->is_active = false;
               $sms_setting->save();


                       
               //

               $sms_setting = new Sms_setting();
               $sms_setting->text = "الطلب رقم {{order}} في الإنتظار التأكيد";
               $sms_setting->status = "pending_c";
               $sms_setting->is_active = false;
               $sms_setting->save();


                //

                $sms_setting = new Sms_setting();
                $sms_setting->text = "تم إلغاء الطلب رقم {{order}}";
                $sms_setting->status = "canceled";
                $sms_setting->is_active = false;
                $sms_setting->save();
    }
}
