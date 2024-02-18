<section>
    <h2 class="title title-center" style="font-size:3.2vh">منتوجات مشابهة </h2>

    <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
        data-owl-options="{
                'items': 5,
                'nav': false,
                'loop': false,
                'dots': true,
                'margin': 20,
                'responsive': {
                    '0': {
                        'items': 2
                    },
                    '768': {
                        'items': 3
                    },
                    '992': {
                        'items': 4,
                        'dots': false,
                        'nav': true
                    }
                }
            }">

    
       @foreach ($products as $item)
           

            <div class="product text-center sale shadow-media cart-full">
                <figure class="product-media">
                    <a href="{{ route('barbarostools.product.details', $item->product->num) }}">
                        
                        
                            @if ($item->product->main_photo != null)

                                <div class="image_product" style="background-image: url('{{ asset($item->product->main_photo->link) }}');">

                                </div>
                            {{--   <img src="{{ asset($item->product->main_photo->link) }}" alt="product" width="280" height="315" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;"> --}}

                            @else

                                @if ($item->product->productPhotos()->first() != null)

                                <div class="image_product" style="background-image: url('{{ asset($item->product->productPhotos()->first()->link ) }}');">

                                </div>


                                @else

                                <div class="image_product" style="background-image: url('{{ asset('product_holder.png') }}');">

                                </div>

                                
                                @endif
                                

                            @endif

                            
                    </a>
                    
                        @if ($item->discount != 0)

                                <div class="product-label-group" >
                                    <label class="product-label label-sale" style="background-color: #FFD700">{{$item->discount}} % تخفيض</label>
                                </div>
                            
                        @endif
                 
                    <div class="product-action-vertical">

                    </div>
                    <div class="product-action">
                        <a href="{{ route('barbarostools.product.details',$item->product->num) }}"
                            class="btn-product" title="Afficher les Détails">عرض التفاصيل</a>
                    </div>
                </figure>
                <div class="product-details">
                 {{--    <div class="product-cat">
                        <a href="shop-grid-3cols.html">Électronique</a>
                    </div> --}}
                    <h3 class="product-name" dir="rtl">
                        <a href="{{ route('barbarostools.product.details',$item->product->num) }}">{{$item->product->name}}</a>
                    </h3>
                    <div class="product-price" dir="rtl">
                        <span class="price">{{number_format($item->price, 2, ',', '.')  }}  دج</span>
                    </div>
                    <a href="{{ route('barbarostools.checkout',$item->id ) }}" class="btn-product btn-cart-change" title="Acheter maintenant"><i
                        class="d-icon-bag"></i>أطلب الأن</a>
                </div>
                
            </div>
       
    
           
        @endforeach
     
     
      


      
    </div>
</section>