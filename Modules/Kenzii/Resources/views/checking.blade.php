@extends('kenzii::layouts.master')

@section('content')


<section class="shipwreck-section">
    <div class="container-fluid h-100">
        <div class="row justify-content-end h-100">
        	<div class="col-md-8 my-auto">
        	<h2>هل جهازي لاسوفت أصلي ؟</h2>
	
	            <p>
                	للتأكد من أن جهازك لاسوفت برو أصلي قومي بإدخال الرقم التسلسلي للجهاز الموجود اسفل العلبة
                </p>
            </div>
        </div>
    </div>
</section>
<section class="serial-number-section">
    <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-12 text-center">
                               <h2>يرجى إدخال الرقم التسلسلي هنا</h2>

            	<!-- <form > -->
                	<input id="productCode" type="text" placeholder="-LS" class="serial-number" />
                    <button class="stay-tuned-for-more" onclick="check();" type="button">اضغط هنا للتحقق</button>
                <!-- </form> -->
            </div>
        </div>
        <div id="is-orginal" class="justify-content-center"></div>
    </div>
</section>{{--
<section class="video-section">
    <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-12">
            	<h2>شرح طريقة التحقق من أن جهازك <span class="pink">كينــزي أصلي</span></h2>
            	<div class="video-box">
                	<div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
                <h3> <span class="pink">كينـزي الأصلي</span> يزيل الشعر الزائد نهائيا و بدون ألم!</h3>
            </div>
        	<div class="col-md-12 text-center">
                <form action="{{route('kenzii.checkout')}}" method="GET" id="checkout_form_1">
                    @csrf
                    <a href="javascript:void(0)" style="text-decoration : none" onclick="document.getElementById('checkout_form_1').submit(); return false;" class="order-now buy_btn">أطلـب الآن </a>
                </form>
            </div>
        </div>
    </div>
</section>
--}}
<hr>
@endsection
