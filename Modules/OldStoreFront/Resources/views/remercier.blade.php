@extends('OldStoreFront::layouts.template')

@section('content')
    <div class="lx-main-content">
        <div class="lx-cart-thanks">
            <p>
                <i class="material-icons">check</i>
                <br>لقد تم تسجيل طلبكم بنجاح
                <br>سيتم الاتصال بكم هاتفيا لتاكيد الطلب
                <br>يرجى الرد على اتصالنا الوارد <a href="tel:0770878161" target="_blanck"></a>
                <br>شكرا !!!</p>
            <div class="lx-cart-thanks-btns">
                <a href="{{url('/')}}">إكمال التسوق <i class="fa fa-angle-left"></i></a>
            </div>
        </div>
        <div class="lx-clear-fix"></div>
    </div>
@endsection

