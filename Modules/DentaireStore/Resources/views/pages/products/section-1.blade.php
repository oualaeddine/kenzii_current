<div class="product product-single row mb-8">
    <div class="col-md-6">
        <div class="product-gallery" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important">
            <div class="lx-g1">
            <div class="lx-product-images">
                <div class="lx-product-main-img ">

                    @if ($store_product->discount != 0)

                                <div class="product-label-group" >
                                    <label class="product-label label-sale" style="background-color: #36098B">{{$store_product->discount}} % off</label>
                                </div>
                            
                    @endif
                  
                    @if ($product->main_photo != null)

                                    <img src="{{asset($product->main_photo->link)}}"
                                                alt="image title here" data-nb="0">

                        
                    @else

                            @if ($product->productPhotos->isNotEmpty())
                
                                    <img 
                                    src="{{asset($product->productPhotos->first()->link)}}"
                                    data-nb="0">


                            @else

                                    <img 
                                    src="{{asset('/product_holder.png')}}"
                                    data-nb="0">

                            
                            @endif


                    @endif
                    
               

                  
                </div>
                <ul>
                    @foreach($product->productPhotos  as $photo)
                        <li><img src="{{asset($photo->link)}}"></li>
                    @endforeach
                    <div class="lx-clear-fix"></div>
                </ul>
            </div>
        </div>
          
        </div>
    </div>
    <div class="col-md-6 sticky-sidebar-wrapper">
        <div class="product-details sticky-sidebar" data-sticky-options="{'minWidth': 767}">
            <div class="product-navigation">
                <ul class="breadcrumb breadcrumb-lg">
                    <li><a href="{{route('dentaire_store.index')}}"><i class="d-icon-home"></i></a></li>
                    <li><a href="javascript:;" class="active">Produits</a></li>
                   {{--  <li>Simple</li> --}}
                </ul>

                <ul class="product-nav">
                    <li class="product-nav-prev">
                        <a href="{{route('dentaire_store.products',$products_next[0]->product->slug)}}">
                            <i class="d-icon-arrow-left"></i> Précédent
                            <span class="product-nav-popup">
                                <img src="{{ asset( $products_next[0]->product->productPhotos()->first()->link )}}"
                                    alt="product thumbnail" width="110" height="123">
                                <span class="product-name">{{$products_next[0]->product->name}}</span>
                            </span>
                        </a>
                    </li>
                    <li class="product-nav-next">
                        <a href="{{route('dentaire_store.products',$products_next[1]->product->slug)}}">
                            Suivant<i class="d-icon-arrow-right"></i>
                            <span class="product-nav-popup">
                                <img src="{{asset($products_next[1]->product->productPhotos()->first()->link )}}"
                                    alt="product thumbnail" width="110" height="123">
                                <span class="product-name">{{$products_next[1]->product->name}}</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <h1 class="product-name">{{$product->name}}</h1>
            <div class="product-meta">
                SKU: <span class="product-sku">{{$product->num}}</span>
                MARQUE: <span class="product-brand">{{$product->brand->name}}</span>
            </div>
            <div class="product-price">
                 {{number_format($store_product->price, 2, ',', '.')  }} DA
                @if ($store_product->price_old != null && $store_product->price_old != 0)
                - <span style="text-decoration: line-through;color:gray">{{number_format($store_product->price_old, 2, ',', '.')  }} DA</span> 
                @endif

                <h5 style="font-size:2vh;" class="price price-text fw-bold mt-2">{{$store_product->price_txt}} </h5>
            </div>
            <div class="ratings-container">
              {{--   <div class="ratings-full">
                    <span class="ratings" style="width:100%"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div> --}}
    {{--             <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 81 reviews )</a> --}}
            </div>
            <p class="product-short-desc">{{$product->short_description}}</p>

            <hr class="product-divider">

            <div class="product-form product-qty">
                <div class="product-form-group">
                    <div class="input-group mr-2">
                        <button class="quantity-minus d-icon-minus"></button>
                        <input class="quantity form-control"  type="number" min="1" max="1000000">
                        <button class="quantity-plus d-icon-plus"></button>
                    </div>
                    <button class="btn-product btn-cart-dentaire text-normal ls-normal font-weight-semi-bold btn-store-in" data-id="{{$store_product->id}}" id="add-cart-qty"  {{-- onclick="AddToCart({{$store_product->id}})" --}}><i class="d-icon-bag mr-2" ></i>
                            Ajouter au panier</button>
                </div>
            </div>

            <hr class="product-divider mb-3">

            <div class="product-footer">
               {{--  <div class="social-links mr-4">
                    <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                    <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                    <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
                </div>
                <span class="divider d-lg-show"></span>
                <div class="product-action">
                    <a href="#" class="btn-product btn-wishlist mr-6"><i
                            class="d-icon-heart"></i><span>Add to
                            wishlist</span></a>
                    <a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add to
                        compare</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>