@extends('DefaultStoreFront::layouts.master')

@section('content')



    <!-- Product Information -->
    @include('DefaultStoreFront::sections.checkout.product_info')
    <!-- Product Information -->

    <!-- Checkout Form-->
    @include('DefaultStoreFront::sections.checkout.checkout_form')
    <!-- Checkout Form-->
    <script>
        fbq('track', 'AddToCart');
        fbq('track', 'InitiateCheckout');
    </script>


@push('js')

        <script>


            $('#phone').on('input', function() {
              
                if($(this).val().length < 10){
                    $('#checkout-submit-btn').attr('disabled',true);
                    $('#phone_val').show();
                }else{

                    $('#checkout-submit-btn').attr('disabled',false);
                    $('#phone_val').hide();

                }
                 
                 
            });


        
            $('#checkout_form').on('submit', function() {
                  $('#checkout-submit-btn').attr('disabled',true);
                  $('#checkout-submit-btn').text('انتظر طلبك قيد المعالجة ...');
            });


            
        </script>
    
@endpush
   

@endsection
