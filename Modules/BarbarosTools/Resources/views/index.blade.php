@extends('barbarostools::layouts.master')

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
                    <input name="phone" type="number" oninvalid="this.setCustomValidity('الرجاء إدخال رقم الهاتف')" oninput="setCustomValidity('')" class="form-control form-control-lg" required id="phone">
                </div>

                <div style="text-align: center !important;">
                    <button class="btn btn-secondary " id="close-btn" type="button">لا شكرا</button>
                    <button class="btn btn-dark" style="width: 74px" type="submit">إرسال</button>
                    
                </div>
        </form>
      {{-- </div> --}}
    </div>
   
    @include('barbarostools::layouts.header')
    <!-- End of Header -->

    <main class="main">
        <div class="page-content">

           {{-- @include('barbarostools::pages.home.section-1') --}}
            
            @include('barbarostools::pages.home.section-2')

           {{--  @include('barbarostools::pages.home.aside') --}}
         
           
        </div>
    </main>
    <!-- End of Main -->

    @include('barbarostools::layouts.footer')
    
    <!-- End of Footer -->
</div>


    @include('barbarostools::layouts.header_mobile')

 

   

    @push('js')


    <script>
    
    
        $(window).on('load', function(){

                $('.lazyload').each(function() {
    
                   
    
                   var lazy = $(this);
                   var src = lazy.attr('data-src');
    
                        $('<img>').attr('src', src).on('load',function(){
                            lazy.find('img.spinner').remove();
                            lazy.css('background-image', 'url("'+src+'")');
                        });
                        
                });
    
          });
    
    
       </script>


            <script>

                var count_click = "{{request()->get('page')}}";

                    if(count_click == 3){
                        appendDiv();
                    }



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

               

                if(count_click === ""){
                    timeoutID = window.setTimeout(appendDiv, 60000);
                }
               
                $("#close-btn").click(function() {
                    $.magnificPopup.close();
                });

            </script>



        
    @endpush
@endsection
