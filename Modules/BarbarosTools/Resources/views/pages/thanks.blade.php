@extends('barbarostools::layouts.master')

@section('content')

@push('css')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


<style>
    a {
        color:#444 !important;
    }

    a:hover{
        color:#763ce1 !important;
    }
    .btn-shop:hover{
        background-color:#763ce1 !important;
    }
</style>
    
@endpush


    @include('barbarostools::layouts.header')
    <!-- End of Header -->


    <div class="container mb-8" style="min-height: 65vh">

        {{-- <div class="card"> --}}
            <div class="card-body text-center mt-8 mb-8" dir="rtl">
                <p style="font-size: 22px">
                     <i class="d-icon-check text-success"></i>
                    <br>لقد تم تسجيل طلبكم بنجاح
                    <br>سيتم الاتصال بكم هاتفيا لتاكيد الطلب
                    <br>يرجى الرد على اتصالنا الوارد <a href="tel:0770878161" target="_blanck"></a>
                    <br>شكرا !!!</p>
                <div class="lx-cart-thanks-btns">
                    
                    <a href="{{url('/')}}" class="btn btn-shop" style="font-size:16px;background-color:#FFD700;color:white !important;width:180px;" >إكمال التسوق <i class="d-icon-bag" style="font-size:14px"></i></a>
                </div>
            </div>
            <div class="lx-clear-fix"></div>
       {{--  </div> --}}
    
        
    
    
    </div>

{{--     <script>
        fbq('track', 'Purchase');
    </script> --}}


    <!-- End of Main -->

    @include('barbarostools::layouts.footer')
    
    <script>
        fbq('track', 'Purchase', {
            value: {!! $price !!},
            currency: 'DZD'
        });    </script>

    <!-- End of Footer -->
</div>

    @include('barbarostools::layouts.header_mobile')

    @push('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" 
    integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        
    @endpush
@endsection