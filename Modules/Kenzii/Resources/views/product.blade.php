@extends('kenzii::layouts.master')

@section('content')



<section class="section-one">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
            	<h2><span class="pink">كينـزي الأصلي</span> يزيل الشعر الزائد نهائيا و بدون ألم!</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid iner">
    	<div class="container">
            <div class="row">
                <div class="col-md-7">
                	<div class="box-left">
                    	<h3>جهاز الليزر <span class="pink">كينـزي الأصلي</span> لإزالة الشعر نهائيا</h3>
                        <div class="row">
                            <div class="col-md-5 d-block d-md-none">
                                <div class="box-right">
                                    {{-- <img src="{{asset('kenzii_store/assets/images/pink.png')}}" class="img-fluid pink-image " alt="" /> --}}
                                    <img src="{{asset('kenzii_store/assets/images/whait.png')}}" class="img-fluid whait-image active" alt="" />
                                </div>
                            </div>
                        </div>
                        <form action="{{route('kenzii.checkout')}}" method="GET" id="checkout_form">
                            @csrf
                        <h4>السعر : <span class="pink"> 24000 دج</span> <span class="line-through">32000 دج</span> <br />  2 ملاين و 400 ألف</h4>
                        {{-- <div class="row">
                        	<div class="col-md-12">
                            	<label>اختاري اللون :</label>
                                <div class="checkbox">
                                	<input class="styled-checkbox" id="styled-checkbox-1" type="radio" name="product" value="Pink">
                                    <label for="styled-checkbox-1" class="pink"></label>
                                </div>
                                <div class="checkbox">
                                	<input class="styled-checkbox white" id="styled-checkbox-2" type="radio" name="product" value="White">
                                    <label for="styled-checkbox-2" class="white"></label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="action-btn">
                        	<div class="row">
                                <div class="col-md-12">
                                	<a href="javascript:void(0)" style="text-decoration : none " onclick="document.getElementById('checkout_form').submit(); return false;" class="clicke-here-to-buy">إضـغط هنـا للـشراء</a>
                                </div>
                                <div class="col-md-12">
                                    <p>تقيمات 863</p>
                                    <div class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-md-5 d-none d-md-block">
                	<div class="box-right">
                    	{{-- <img src="{{asset('kenzii_store/assets/images/pink.png')}}" class="img-fluid pink-image active" alt="" /> --}}
                        <img src="{{asset('kenzii_store/assets/images/whait.png')}}" class="img-fluid whait-image active" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-six">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
            	<h2>تعليقات الزبائن عن <span class="pink">كينزي الأصلي</span></h2>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-4 col-sm-6">
            	<div class="boxes">
                	<img src="{{asset('kenzii_store/assets/images/Calque 50 copie.png')}}" class="img-fluid" alt="" />
                	<img src="{{asset('kenzii_store/assets/images/Calque 50 copie.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        	<div class="col-md-4 col-sm-6">
            	<div class="boxes">
                	<img src="{{asset('kenzii_store/assets/images/Calque 49.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        	<div class="col-md-4 col-sm-6">
            	<div class="boxes">
                	<img src="{{asset('kenzii_store/assets/images/Calque 48.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12 text-center">
                <form action="{{route('kenzii.checkout')}}" method="GET" id="checkout_form_1">
                    @csrf
                    <a href="javascript:void(0)" style="text-decoration : none" onclick="document.getElementById('checkout_form_1').submit(); return false;" class="order-now buy_btn">أطلـب الآن </a>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="section-five pt-0">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
            	<h2>نتائج <span class="pink">كينزي الأصلي</span></h2>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-3 col-6">
            	<div class="boxes">
                	<img src="{{asset('kenzii_store/assets/images/Calque 21.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        	<div class="col-md-3 col-6">
            	<div class="boxes">
                	<img src="{{asset('kenzii_store/assets/images/Calque 22.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        	<div class="col-md-3 col-6">
            	<div class="boxes">
                	<img src="{{asset('kenzii_store/assets/images/Calque 23.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        	<div class="col-md-3 col-6">
            	<div class="boxes">
                	<img src="{{asset('kenzii_store/assets/images/Calque 24.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<section class="top-footer">
    <div class="container">
        <div class="row">
        	<div class="col-md-8">
            	<p>
                	اذا كان لديك أي إستفسار أو تريدين التحدث <br /> مع إحدى أخصائياتنا يمكنك الاتصال بنا <br /> 
                    على الهاتف: <a href="tel:0770146313" class="black">0770146313</a><br />
                    على الواتس:  <a href="tel:0770686417" class="black">0770686417</a>
                </p>
            </div>
            <div class="col-md-4 d-block d-md-none">
            	<div class="images-box">
                	<img src="{{asset('kenzii_store/assets/images/Calque 36-mobile.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
