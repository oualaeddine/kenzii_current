@extends('barbarostools::layouts.master')

@section('content')

@push('css')

<link rel="stylesheet" type="text/css" href="{{asset("dentaire/vendor/nouislider/nouislider.min.css")}}">


    
@endpush


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

    <main class="main">
     

           {{-- @include('barbarostools::pages.home.section-1') --}}
            
            @include('barbarostools::pages.shop.section')

           {{--  @include('barbarostools::pages.home.aside') --}}
         
           
     
    </main>
    <!-- End of Main -->

    @include('barbarostools::layouts.footer')
    
    <!-- End of Footer -->
</div>

    @include('barbarostools::layouts.header_mobile')

   

    @push('js')

    
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

                timeoutID = window.setTimeout(appendDiv, 60000);

                $("#close-btn").click(function() {
                    $.magnificPopup.close();
                });

            </script>


        <script>

            $('#count_pages').on('change',function(){

                var price_upper  = $('.noUi-handle-upper').attr('aria-valuetext');
                var price_lower = $('.noUi-handle-lower').attr('aria-valuetext');
                var category_selected = '{{$category_selected}}';
                var current_brand = '';

                $('.brand').each(function(){
                      if($(this).hasClass('active')){

                          current_brand = current_brand + '&brand[]='+$(this).data('id');
              
                      }
                });
               

            

                if(price_lower != 1000.00 || price_upper != 150000.00){
                    $href = '/bt/shop?nbr_pages='+$(this).val()+'&tp='+$('#orderby').val()+'&search='+$('#search').val()+'&price_lower='+price_lower+'&price_upper='+price_upper+'&brand='+current_brand+'&category='+category_selected;
                }else{
                    $href = '/bt/shop?nbr_pages='+$(this).val()+'&tp='+$('#orderby').val()+'&search='+$('#search').val()+'&brand='+current_brand+'&category='+category_selected;
                }
                 

                  $('#loading_sec').show();
                  $("#products_page").hide();

                  location.replace($href);

                  $.when( $.get($href, function(response) { //append data
                            $html = $(response).find("#products_page").html(); 
                            $html_pag = $(response).find("#pagination_nav").html(); 

                            $('#products_page').html($html);
                            $('#pagination_nav').html($html_pag);

                            $('#loading_sec').hide();
                            $("#products_page").show();


                        })).done(function() {

                            });

            });
            
        </script>


        <script>

            $('#orderby').on('change',function(){

                var price_upper  = $('.noUi-handle-upper').attr('aria-valuetext');
                var price_lower = $('.noUi-handle-lower').attr('aria-valuetext');
                var category_selected = '{{$category_selected}}';

                var current_brand = '';

                $('.brand').each(function(){
                    if($(this).hasClass('active')){

                        current_brand = current_brand + '&brand[]='+$(this).data('id');

                    }
                });


                if(price_lower != 1000.00 || price_upper != 150000.00){
                    $href = '/bt/shop?tp='+$(this).val()+'&nbr_pages='+$('#count_pages').val()+'&search='+$('#search').val()+'&price_lower='+price_lower+'&price_upper='+price_upper+'&brand='+current_brand+'&category='+category_selected;
                }else{
                    $href = '/bt/shop?tp='+$(this).val()+'&nbr_pages='+$('#count_pages').val()+'&search='+$('#search').val()+'&brand='+current_brand+'&category='+category_selected;
                }
               

                $('#loading_sec').show();
                $("#products_page").hide();

                location.replace($href);

                $.when( $.get($href, function(response) { //append data
                            $html = $(response).find("#products_page").html(); 
                            $html_pag = $(response).find("#pagination_nav").html(); 

                            $('#products_page').html($html);
                            $('#pagination_nav').html($html_pag);

                            $('#loading_sec').hide();
                            $("#products_page").show();


                        })).done(function() {

                            });

            });
            
        </script>

        <script>

                $('#submit-price-filter').on('click',function(){

                    $('#price_upper').val($('.noUi-handle-upper').attr('aria-valuetext'));

                    $('#price_lower').val($('.noUi-handle-lower').attr('aria-valuetext'));

                });

                var price_l = '{{$price_lower}}';
                var price_u = '{{$price_upper}}';

               
                Riode.priceSlider = function ( selector, option ) {
                    if ( typeof noUiSlider === 'object' ) {
                        Riode.$( selector ).each( function () {
                            var self = this;

                            noUiSlider.create( self, $.extend( true, {
                                start: [ price_l , price_u ],
                                connect: true,
                                step: 1,
                                range: {
                                    min: 1000,
                                    max: 150000
                                }
                            }, option ) );

                            // Update Price Range
                            self.noUiSlider.on( 'update', function ( values, handle ) {
                                var values = values.map( function ( value ) {
                                    return parseInt( value )+' DA';
                                } )
                                $( self ).parent().find( '.filter-price-range').text( values.join( ' - ' ) );
                            } );
                        } );
                    }
                }

        </script>

        <script>

            /*  var brands = []; */


             $('.brand').each(function(){
                      if($(this).hasClass('active')){

                        $('#filter_form').append('<input type="hidden" name="brand[]" id="brand'+$(this).data('id')+'" value="'+$(this).data('id')+'">');
                        /*  brands.push($(this).data('id')); */
                      }
            });

              /* console.log(brands); */

           /*  $('#brand').val(brands); */

             function SelectBrand(id){

                if( $('#Brand-'+id).hasClass('active') ){

                      /* brands = brands.filter(item => item !== id); */
                      $('#brand'+id).remove();

                }else{
                     $('#filter_form').append('<input type="hidden" name="brand[]" id="brand'+id+'" value="'+id+'">');
                }
 
               

               /*  consol */

              /*   console.log(brands); */

             }
             



        </script>
        
    @endpush
@endsection
