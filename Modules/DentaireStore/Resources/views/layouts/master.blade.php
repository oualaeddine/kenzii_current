<!DOCTYPE html>
<html lang="en" >
     @include('dentairestore::partials.head')

     @include('dentairestore::partials.style')

    <body>
        @include('dentairestore::partials.header2')
        <div class="page-wrapper">
           @yield('content')

           @include('dentairestore::partials.footer')

           @include('dentairestore::partials.cookies')
         
        </div>

        @include('dentairestore::partials.footer_mobile')

        <div class="newsletter-popup mfp-hide non-printable" id="special-popup"  style="background-image: url('{{asset('popup_img.jpg')}}');background-size: 47% 100%;background-repeat: no-repeat;background-position: left;">
            <div class="newsletter-content">
              {{--   <h4 class="text-uppercase text-dark">Up to <span class="text-primary">20% Off</span></h4> --}}
                <h2 class="font-weight-semi-bold">Besoin d'aide ?</h2>
                <p class="text-grey">Laissez-nous votre numéro de téléphone et nous vous appellerons bientôt, merci.</p>
                <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                    <input type="phone" class="form-control phone" name="phone" id="phone2" placeholder="Votre téléphone ici..."
                    required="">
                    <button class="btn btn-dark" type="submit">Sauver</button>
                </form>
                <div class="form-checkbox justify-content-center">
                    <input type="checkbox"  class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                    required />
                    <label for="hide-newsletter-popup">Ne plus afficher cette fenêtre contextuelle</label>
                </div>
            </div>
        </div>

        <div class="minipopup-area non-printable">
          

            {{-- @php
                $count = ['1','1','1','1','1','1'];
                $c = 0;
            @endphp --}}

            @foreach ($purchased as $item)

                    <div class="minipopup-box " style="display: none">
                        <p class="minipopup-title">Quelqu'un a acheté</p>
                        <div class="product product-purchased product-cart mb-0">
                            <figure class="product-media"><a href="{{route('dentaire_store.products',$item->orderProducts->first()->product->slug)}}"><img src="{{asset($item->orderProducts->first()->product->productPhotos()->first()->link)}}" alt="product" width="80"
                                        height="80"></a>
                            </figure>
                            <div class="product-detail">
                                <a href="{{route('dentaire_store.products',$item->orderProducts->first()->product->slug)}}" class="product-name">{{$item->orderProducts->first()->product->name}}</a>
                                
                                <span class="purchased-time">Il Y A {{$item->time_diff}}</span>
                            </div>
                        </div>
                    </div>
                
            @endforeach
           


           
        </div>

        

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/productmi.js') }}"></script> --}}

        @include('dentairestore::partials.js')

        {{-- @if (Config::get('app.url') != 'http://127.0.0.1:8000/') --}}

        @include('dentairestore::partials.cookiesJs')


        <script>
            
        $(document).ready(function() {

            var hours = 24; // Reset when storage is more than 24hours
            var now = new Date().getTime();

            var test_val = localStorage.getItem('HidePopup') || false;

            if(test_val != false){

                if(now-test_val > hours*60*60*1000) {
                    localStorage.removeItem('HidePopup');
                 }

            }
            

            function appendDiv() {
            
                $.magnificPopup.open({
                    items: {
                        src: '#special-popup',
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

            if(test_val == false){
                timeoutID = window.setTimeout(appendDiv, 1000);
            }


            
            $("#show-needhelp-popup").click(appendDiv);
            


            $("#hide-newsletter-popup").click(function() {
                localStorage.setItem('HidePopup',now);
                $.magnificPopup.close();
            });


        });

        </script>



        <script>


               

            // to do later 

            
           /*  var purchsed = @json($purchased);

            $.each(purchsed,function() {
                var item = $(this);

                   console.log(item[0].order_products);
            }) */

            var top_v = 0;

   

            $('.minipopup-box').on('click',function(){
                var sib = $(this).next().css('top');
 
                if(sib){
                    $(this).next().css('top',parseInt(sib) + 185 );
            
                }
                $(this).remove();
            });

            function appendDiv() {
                var $cards = $('.minipopup-area .minipopup-box');

                var time = 15000;



                $cards.each(function() {
                    var item = $(this);

                    setTimeout( function(){ addSClass(item); }, time)
                    time += Math.floor((Math.random()*10) + 15) * 1000;
                });
            }

            timeoutID = window.setTimeout(appendDiv, 1000);

            function addSClass(item) {

                var count = $('.minipopup-area .show').length;

                if(count == 4){
                    

                    var $cards = $('.minipopup-area .minipopup-box');

                    var counter = 1;

                    $cards.each(function() {

                            if(counter == 1){

                                $(this).remove();

                            }else{
                                $(this).css('top',parseInt($(this).css('top')) + 185 );
                            }
                           
                            counter++;

                    });
                   
                }

                  var sib = item.prev().css('top');

                  if(sib){
                        top_v = parseInt(sib) - 185 ;
                  }else{
                        top_v = 0;
                  }



                 item.attr('style','top:'+top_v+'px');
                 item.addClass('show');
                 


                 setTimeout( function(){ removeSClass(item); }, 35000)


            }

            function removeSClass(item){ 

                    item.removeClass('show');

                    var $cards = $('.minipopup-area .minipopup-box');

                    $cards.each(function() {

                         $(this).css('top',parseInt($(this).css('top')) + 185 );

                    });

            }

        </script>

        {{-- @endif --}}

        
        <script>

            /* function AddToCart(id){ */

            $('.btn-store-in').on('click',function(){

                var id = $(this).data('id');

                if($(this).attr('id') == 'add-cart-qty'){
                
                var quantity = $('.quantity').val();
                
                if(quantity == 0 || quantity == null || quantity == '' ){
                       quantity = 1;
                }else{
                    quantity = quantity;
                }
                
                }else{
                var quantity = 1;
                }
                
                
                
                $.ajax({
                url: "{{route('dentaire_store.cart.store')}}",
                type: 'POST', dataType: 'json',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                data: {
                    product:id,
                    quantity:quantity
                },
                
                error: function (error) {
                    toastr.options.positionClass = 'toast-bottom-left';
                    toastr.error("Une erreur s'est produite , réessayez s'il vous plaît!");
                },
                success: function (data) {
                
                      toastr.options.positionClass = 'toast-bottom-left';
                      toastr.success("Produit ajouté au panier avec succès!");
                
                      $('.cart-price-span').text(data.total);
                      $('.cart-count').text(data.count);
                
                      $('#cart_space').empty();
                
                      $.each(data.data, function (idx, elem) {
                          
                
                        var url_img = window.location.origin+'/'+elem.options.image ;
                
                       /*  <span class="product-price">{{number_format($item->price, 2, '.', ',')}} DA <span style="color: gray">X {{$item->qty}}</span> </span> */
                        var price =  '<span class="product-price">'+(elem.price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' DA <span style="color: gray">X '+elem.qty+'</span></span>';
                
                        var detail = '<div class="product-detail"><a href="{{route("dentaire_store.products",'+elem.options.slug+')}}" class="product-name">'+elem.name+'</a><div class="price-box">'+price+'</div></div>';
                
                        var button =   '<button class="btn btn-link btn-close" onclick="DeleteItem('+elem.id+')"><i class="fas fa-times"></i></button>';
                
                        var figure = '<figure class="product-media"> <a href="{{route("dentaire_store.products",'+elem.options.slug+')}}"><img src="'+url_img+'" alt="product" style="max-height:88px;max-width:80px" width="80" height="88" /> </a>'+button+'</figure>';
                
                        var content = '<div class="product product-cart item'+elem.id+'">'+figure+detail+'</div><hr>'
                
                        $('#cart_space').append(content);
                
                      });
                
                    
                
                
                      
                     /*  console.log(data.total); */
                
                }
                });

            });

               


           /*  } */


            function DeleteItem(id){

                

                $.ajax({
                    url: "{{route('dentaire_store.cart.destroy')}}",
                    type: 'DELETE', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    data: {
                        item:id,
                    },

                    error: function (error) {
                        toastr.options.positionClass = 'toast-bottom-left';
                        toastr.error("Une erreur s'est produite , réessayez s'il vous plaît!");
                    },
                    success: function (data) {

                          if(data.success == true){

                            toastr.options.positionClass = 'toast-bottom-left';
                            toastr.success(data.message);

                            $('.cart-price-span').text(data.total);
                            $('.cart-count').text(data.count);
                             
                            var item = '.item'+id;

                            $(item).remove();

                          }else{

                            toastr.options.positionClass = 'toast-bottom-left';
                            toastr.error(data.message);

                          }
                       
                          
                         /*  console.log(data.total); */

                    }
                });


            }

        </script>

        <script>
            @if(Session::has('success'))
               toastr.success("{{ Session::get('success') }}")
           @endif
           
           @if(Session::has('orange'))
              toastr.info("{{ Session::get('orange') }}")
           @endif
           
           @if(Session::has('error'))
              toastr.error("{{ Session::get('error') }}")
           @endif
        </script>
        
        
      
        @stack('js')
    </body>
</html>

