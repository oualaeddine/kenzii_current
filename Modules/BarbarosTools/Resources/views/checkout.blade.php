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
        color:#FFD700 !important;
    }
</style>
    
@endpush

<div class="page-wrapper">

   
    @include('barbarostools::layouts.header')
    <!-- End of Header -->


    
    <div id="test-popup" class="white-popup mfp-hide" style="text-align: right;" >
       
        {{--  <div class="newsletter-content" > --}}
 
             {{-- <h2 dir="rtl" style="float: right">هل تحتاج مساعدة ؟</h2>
             <p dir="rtl" style="float: right">يمكنك ترك رقم هاتفك وسوف نتصل بك </p> --}}
 
       {{--       <h4 class="text-uppercase text-dark">Up to <span class="text-primary">20% Off</span></h4> --}}
         <div>
 
             <h2 style="font-size: 24px" dir="rtl">هل تحتاج مساعدة ؟</h2>
             <p class="text-grey"   dir="ltr">يمكنك ترك رقم هاتفك وسوف نتصل بك </p>
 
         </div>
 
 
         <form action="{{route('contact.store')}}" method="post" >
 
             @csrf
 
             <input type="hidden" class="form-control" name="email" id="email2" placeholder="Email address here..."
                 required="">
 
                 <div class="mb-3 col-md-12 " dir="rtl">
                     <label for="firstname" class="form-label"  >الاسم و اللقب <span class="text-danger"> * </span></label>
                     <input name="firstname" oninvalid="this.setCustomValidity('الرجاء إدخال الإسم واللقب')" oninput="setCustomValidity('')" type="text" class="form-control form-control-lg" required id="firstname">
                 </div>
 
                 <div class="mb-3 col-md-12  " dir="rtl">
                     <label for="phone" class="form-label"  >رقم الهاتف <span class="text-danger"> * </span></label>
                     <input name="phone" type="number" oninvalid="this.setCustomValidity('الرجاء إدخال رقم الهاتف')" oninput="setCustomValidity('')" onKeyPress="if(this.value.length==10) return false;" class="form-control form-control-lg" required id="phone">
                 </div>
 
                 <div style="text-align: center !important;">
                     <button class="btn btn-secondary" id="close-btn" type="button">لا شكرا</button>
                     <button class="btn btn-dark"type="submit">إرسال</button>
 
                 </div>
         </form>
       {{-- </div> --}}
     </div>

 
        <div class="container mt-8">

            <div class="card shadow">
                <div class="card-body">

                    <div class="text-center" dir="rtl">

                        <h2 class="fw-bold" >{{$product->product->name}} * <span> {{$quantity}} </span> </h2> 
                        <h2 class="price fw-bold mb-0 mt-2" style=" color:#FFD700" dir="rtl">{{number_format($product->price * $quantity, 2, ',', '.')  }} دج</h2>

                        @if ($quantity == 1)
                           <h3 class="price fw-bold mb-0 mt-2 price-text" >{{$product->price_txt}} </h3>
                        @endif
                 

                    </div>

                    <section class="text-right mt-4" style="font-size:2.3vh">
                        <div class="container">
                    
                            <div class="row">
                    
                                <div class="col-md-12">
                    
                                    <form action="{{route('barbarostools.checkout.store')}}" method="post" id="checkout_form">
                                        @csrf
                            
                                        <input type="hidden" name="store_product" value="{{$store_product}}">
                                        <input type="hidden" name="quantity" value="{{$quantity}}">


                                        <div class="mb-3 col-md-12" dir="rtl">
                                            <label for="firstname" class="form-label">الاسم و اللقب <span class="text-danger"> * </span></label>
                                            <input name="firstname" oninvalid="this.setCustomValidity('الرجاء إدخال الإسم واللقب')" oninput="setCustomValidity('')" type="text" class="form-control form-control-lg" required id="firstname">
                                        </div>
                                        <div class="mb-3 col-md-12 " dir="rtl">
                                            <label for="phone" class="form-label">رقم الهاتف <span class="text-danger"> * </span></label>
                                            <input name="phone" type="number" oninvalid="this.setCustomValidity('الرجاء إدخال رقم الهاتف')" oninput="setCustomValidity('')"  class="form-control form-control-lg" required id="phone_nbr">
                                            <span class="text-danger" style="display: none" id="phone_val"> يجب على رقم الهاتف ان يكون مكون من 10 أرقام أو اكثر</span>
                                        </div>
                                        <div class="mb-3 col-md-12 " dir="rtl">
                                            <label for="state" class="form-label">الولاية <span class="text-danger"> * </span></label>
                                            <input name="state" type="text" oninvalid="this.setCustomValidity('الرجاء إدخال الولاية')" oninput="setCustomValidity('')" class="form-control form-control-lg" required id="state">
                                        </div>
                                        <div class="mt-4 col-md-12 ">
                                            <button class="btn text-white btn-order" type="submit" id="checkout-submit-btn">أطلب الأن</button>
                                        </div>
                                    </form>
                    
                                </div>
  
                            </div>
                          
                        </div>
                    </section>

                    <hr class="product-divider">

                    <div class="product-footer text-center" dir="rtl">

                        <div class="social-links mr-4">
                            <a href="javascript:;" class="nav-link icons-service price-text"><i class="d-icon-check icons"></i> منتج اصلي  </a>
                        </div>
        
        
                        <div class="social-links mr-4">
                            <a href="javascript:;" class="nav-link icons-service price-text"><i class="d-icon-compare icons"></i> توصيل سريع للمنزل  </a>
                        </div>
        
                        <div class="social-links mr-4">
                            <a href="tel:0770496866" target="_blanck" class="nav-link icons-service price-text"><i class="d-icon-phone icons"></i>  خدمة الزبائن عبر الهاتف  (0770496866)</a>
                        </div>

                    </div>

                </div>
            </div>

            <section class="section mt-3 text-right" dir="rtl">
                <div class="container">
                  
                    {{-- <h2 class="price text-danger fw-bold mb-0 mt-2">{{$price_info->price}} دج</h2> --}}
                </div>
            </section>
 
        
           
        </div>
  
    <!-- End of Main -->

    @include('barbarostools::layouts.footer')
    
    <!-- End of Footer -->
</div>

    @include('barbarostools::layouts.header_mobile')

    <script>
        fbq('track', 'AddToCart');
        fbq('track', 'InitiateCheckout');
    </script>

    @push('js')
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" 
    integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

    <script>

        
            $('#phone_nbr').on('input', function() {

              if($(this).val().length < 10){
                  $('#checkout-submit-btn').attr('disabled',true);
                  $('#phone_val').show();
              }else{

                  $('#checkout-submit-btn').attr('disabled',false);
                  $('#phone_val').hide();

              }

            });


            function appendDiv() {
                    $.magnificPopup.open({
                        items: {
                            src: '#test-popup',
                            type: 'inline'
                        },callbacks: {
                            beforeOpen: function() {
                                $('body').addClass('mfp-active');
                            },
                            beforeClose: function() {
                                $('body').removeClass('mfp-active');
                            }
                        }
                    });
                }


                timeoutID = window.setTimeout(appendDiv, 40000);

                $("#close-btn").click(function() {
                    $.magnificPopup.close();
                });


        
        $('#checkout_form').on('submit', function() {
              $('#checkout-submit-btn').attr('disabled',true);
              $('#checkout-submit-btn').text('انتظر طلبك قيد المعالجة ...');
        });
        
    </script>
        
    @endpush
@endsection

