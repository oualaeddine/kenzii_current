@extends('DefaultStoreFront::layouts.master')

@section('content')

    <div class="lx-main-content">
        <div class="lx-cart-thanks">
            <p>
                <i class="material-icons">check</i>
                <br>لقد تم تسجيل طلبكم بنجاح
                <br>سيتم الاتصال بكم هاتفيا لتاكيد الطلب
                <br>يرجى الرد على اتصالنا الوارد <a href="tel:0770496866" target="_blanck"></a>
                <br>شكرا !!!</p>
            <div class="lx-cart-thanks-btns">
                <a href="{{url('/')}}">إكمال التسوق <i class="fa fa-angle-left"></i></a>
            </div>
        </div>
        <div class="lx-clear-fix"></div>
    </div>

    <script>
     //   fbq('track', 'Purchase');
        fbq('track', 'Purchase', {currency: "DZD", value: 3000.00});
    </script>

@endsection
