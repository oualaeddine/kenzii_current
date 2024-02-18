<section class="products-wrapper mt-6 pt-2 mb-10 pb-2">
    <div class="title-wrapper">
        <div class="container">
            <h2 class="title">Produits en vedette</h2>
            <span class="title-info">Sélection exclusive</span>
        </div>
    </div>
    <div class="container">
        <div class="owl-carousel owl-theme owl-nav-fade row cols-lg-4 cols-md-3 cols-2"
            data-owl-options="{
            'items': 4,
            'nav': false,
            'dots': false,
            'margin': 20,
            'loop': false,
            'responsive': {
                '0': {
                    'items': 2
                },
                '768': {
                    'items': 3
                },
                '992': {
                    'items': 4,
                    'nav': true
                }
            }
        }">

                @foreach ($featured as $item)

                        <div class="product product-variable text-center">
                        

                            <figure class="product-media">
                                <a href="{{route('dentaire_store.products',$item->product->slug)}}">

                                    @if ($item->product->main_photo != null)
        
                                     <div class="image_product lazyload" {{-- style="background-image: url('{{ $item->product->main_photo->link }}');" --}} data-src="{{ $item->product->main_photo->link }}" >
                                        <img class="spinner" src="loading.gif"/>
                                     </div>

                                   

                                  {{--   <img src="{{ asset($item->product->main_photo->link) }}" alt="product" width="280" height="315" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;"> --}}
        
                                    @else
            
                                        @if ($item->product->productPhotos()->first() != null)
            
                                                <div class="image_product lazyload" data-src="{{ $item->product->productPhotos()->first()->link }}" >
                                                    <img class="spinner" src="loading.gif"/>
                                                </div>
            
            
                                        @else
            
                                                <div class="image_product lazyload" data-src="'/product_holder.png'" >
                                                    <img class="spinner" src="loading.gif"/>
                                                </div>
            
                                        
                                        @endif
                                        
            
                                    @endif


{{-- 
                                    <img src={{asset('dentaire/images/demos/demo-medical/products/1-1.jpg')}} alt="product" width="300"
                                        height="338">
                                    <img src={{asset('dentaire/images/demos/demo-medical/products/1-2.jpg')}} alt="product" width="300"
                                        height="338"> --}}
                                </a>
                                <div class="product-action-vertical">
                                    <a href="javascript:;" {{-- onclick="AddToCart({{$item->id}})"  --}}class="btn-product-icon btn-cart btn-store-in" data-id="{{$item->id}}" data-toggle="modal"
                                    data-target="#addCartModal" title="Ajouter au panier">
                                    <i class="d-icon-bag"></i></a>
                            {{--       <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a> --}}
                            {{--        <a href="#" class="btn-product-icon btn-compare" title="Add to Compare"><i
                                            class="d-icon-compare"></i></a> --}}
                                </div>
                                <div class="product-action">
                                    <a href="{{route('dentaire_store.products',$item->product->slug)}}" class="btn-product" title="Quick View">Aperçu rapide</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="{{route('dentaire_store.products',$item->product->slug)}}">{{$item->product->name}}</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">{{number_format($item->price, 2, '.', ',')  }} DA</span>
                                </div>
                            {{--   <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-medical-product.html" class="rating-reviews">( 6 reviews )</a>
                                </div> --}}
                            </div>
                            @if ($item->discount != 0)

                            <div class="product-label-group" >
                                <label class="product-label label-sale" style="background-color: #037BD0">{{$item->discount}} % off</label>
                            </div>
                            
                             @endif
                        </div>

                
                    
                @endforeach

        </div>
    </div>
</section>