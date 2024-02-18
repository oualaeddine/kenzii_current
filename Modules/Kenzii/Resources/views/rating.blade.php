@extends('kenzii::layouts.master')

@section('content')


    <section class="section-five">
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
            <div class="row">
                <div class="col-md-12 text-center">
                    <form action="{{route('kenzii.checkout')}}" method="GET" id="checkout_form_4">
                        @csrf
                        <a href="javascript:void(0)" style="text-decoration : none" onclick="document.getElementById('checkout_form_4').submit(); return false;" class="order-now buy_btn">أطلـب الآن </a>
                    </form>
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
                <div class="col-md-4">
                    <div class="boxes">
                        <img src="{{asset('kenzii_store/assets/images/Calque 50 copie.png')}}" class="img-fluid" alt="" />
                        <img src="{{asset('kenzii_store/assets/images/Calque 50 copie.png')}}" class="img-fluid" alt="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="boxes">
                        <img src="{{asset('kenzii_store/assets/images/Calque 49.png')}}" class="img-fluid" alt="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="boxes">
                        <img src="{{asset('kenzii_store/assets/images/Calque 48.png')}}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <form action="{{route('kenzii.checkout')}}" method="GET" id="checkout_form_5">
                        @csrf
                        <a href="javascript:void(0)" style="text-decoration : none" onclick="document.getElementById('checkout_form_5').submit(); return false;" class="order-now buy_btn">أطلـب الآن </a>
                    </form>
                </div>
            </div>
        </div>
    </section>





@endsection