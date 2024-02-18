@extends('dentairestore::layouts.master')

@push('css')

<link rel="stylesheet" type="text/css" href="{{asset("dentaire/vendor/nouislider/nouislider.min.css")}}">
{{-- <link rel="stylesheet" type="text/css" href='/dentaire/css/demo6.min.css'> --}}

    
@endpush


@section('content')


    <main class="main">
        <div class="page-header"
            style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
            <h3 class="page-subtitle">Page du magasin</h3>
            <h1 class="page-title">Bienvenue dans notre boutique</h1>
            <ul class="breadcrumb">
                <li><a href="{{route('dentaire_store.index')}}"><i class="d-icon-home"></i></a></li>
                <li class="delimiter">/</li>
                <li>Categories</li>
            </ul>
        </div>
        <!-- End PageHeader -->
        <div class="page-content mb-10 pb-6">
            <div class="container">
               @include('dentairestore::pages.categories.section-1')
            </div>
        </div>
    </main>
    <!-- End Main -->




    @push('js')

 


<script>

    $('#count_pages').on('change',function(){

        var price_upper  = $('.noUi-handle-upper').attr('aria-valuetext');
        var price_lower = $('.noUi-handle-lower').attr('aria-valuetext');

        var current_brand = '';

        $('.brand').each(function(){
              if($(this).hasClass('active')){

                  current_brand = current_brand + '&brand[]='+$(this).data('id');
      
              }
        });
       

    

        if(price_lower != 1000.00 || price_upper != 150000.00){
            $href = '/dentaire_store/catgories?nbr_pages='+$(this).val()+'&tp='+$('#orderby').val()+'&search='+$('#search').val()+'&price_lower='+price_lower+'&price_upper='+price_upper+'&brand='+current_brand;
        }else{
            $href = '/dentaire_store/catgories?nbr_pages='+$(this).val()+'&tp='+$('#orderby').val()+'&search='+$('#search').val()+'&brand='+current_brand;
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
        var current_brand = '';

        $('.brand').each(function(){
            if($(this).hasClass('active')){

                current_brand = current_brand + '&brand[]='+$(this).data('id');

            }
        });


        if(price_lower != 1000.00 || price_upper != 150000.00){
            $href = '/dentaire_store/catgories?tp='+$(this).val()+'&nbr_pages='+$('#count_pages').val()+'&search='+$('#search').val()+'&price_lower='+price_lower+'&price_upper='+price_upper+'&brand='+current_brand;
        }else{
            $href = '/dentaire_store/catgories?tp='+$(this).val()+'&nbr_pages='+$('#count_pages').val()+'&search='+$('#search').val()+'&brand='+current_brand;
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
