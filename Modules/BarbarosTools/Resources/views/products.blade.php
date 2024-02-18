@extends('barbarostools::layouts.master')

@push('css')

<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/magnific-popup/magnific-popup.min.css')}}>

<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/nouislider/nouislider.min.css')}}>
<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/photoswipe/photoswipe.min.css')}}>
<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/photoswipe/default-skin/default-skin.min.css')}}>
    
<link rel="stylesheet" href="{{asset("store/css/general_style.css")}}">
<!-- Main Style of the template -->
<link rel="stylesheet" href="{{asset('store/css/main_style.css')}}">
<!-- Landing Page Style -->
<link rel="stylesheet" href="{{asset('store/css/reset_style.css')}}">

@endpush

@section('content')





<div class="page-wrapper">

    <div id="test-popup" class="white-popup mfp-hide" style="text-align: right;" >
       
        {{--  <div class="newsletter-content" > --}}
    
             {{-- <h2 dir="rtl" style="float: right">هل تحتاج مساعدة ؟</h2>
             <p dir="rtl" style="float: right">يمكنك ترك رقم هاتفك وسوف نتصل بك </p> --}}
    
       {{--       <h4 class="text-uppercase text-dark">Up to <span class="text-primary">20% Off</span></h4> --}}
         <div>
    
             <h2 style="font-size: 24px" dir="rtl">هل تحتاج مساعدة ؟</h2>
             <p class="text-grey"   dir="ltr">يمكنك ترك رقم هاتفك وسوف نتصل بك </p>
    
         </div>
    
    
         <form action="{{route('contact.store')}}" method="post">
    
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
                     <button class="btn btn-dark" type="submit">إرسال</button>
    
                 </div>
         </form>
       {{-- </div> --}}
     </div>
     
   
    @include('barbarostools::layouts.header')
    <!-- End of Header -->
    <main class="main mt-6 single-product">
        <div class="page-content mb-10 pb-6">
            <div class="container">


                @include('barbarostools::pages.product.modal_images')
               

                @include('barbarostools::pages.product.product')

                @include('barbarostools::pages.product.tabs')

{{--
                @include('barbarostools::pages.product.section')
--}}


                
            </div>
        </div>
    </main>
    <!-- End Main -->
  
    @include('barbarostools::layouts.footer')


    <!-- End of Footer -->
</div>

    @include('barbarostools::layouts.header_mobile')




    @push('js')

    

    <script src={{asset("dentaire/vendor/photoswipe/photoswipe.min.js")}}></script>
    <script src={{asset("dentaire/vendor/photoswipe/photoswipe-ui-default.min.js")}}></script>

    <script src="{{asset('/store/js/popup.js')}}" type="text/javascript"></script>
    <script src="{{asset('/store/js/script.js')}}" type="text/javascript"></script>


  
    <script>

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

                timeoutID = window.setTimeout(appendDiv, 30000);

                $("#close-btn").click(function() {
                    $.magnificPopup.close();
                });


                $(window).scroll(function(event){
            
                let oTop = $(".specs").offset().top - window.innerHeight;
                    if ($(window).scrollTop() > oTop) {
                           $('.buy-me').show();
                    
                    } else {
                            $('.buy-me').hide();
                    
                    }
            
                });
    
    
    
    </script>
    
        
    @endpush

@endsection
