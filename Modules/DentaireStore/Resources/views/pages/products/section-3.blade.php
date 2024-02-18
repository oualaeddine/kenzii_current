

                <section class="pt-3 mt-10">
                    <h2 class="title title-center" style="font-size:3.2vh">Produits connexes </h2>
                
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
                                    <a href="{{ route('dentaire_store.products',$item->product->slug) }}">
                                        
                                        
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
                                                    <label class="product-label label-sale" style="background-color: #36098B">{{$item->discount}} % off</label>
                                                </div>
                                            
                                        @endif
                                 
                                    <div class="product-action-vertical">
                
                                    </div>
                                    <div class="product-action">
                                        <a href="{{ route('dentaire_store.products',$item->product->slug) }}"
                                            class="btn-product" title="Afficher les Détails">Afficher les Détails</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                 {{--    <div class="product-cat">
                                        <a href="shop-grid-3cols.html">Électronique</a>
                                    </div> --}}
                                    <h3 class="product-name" >
                                        <a href="{{ route('dentaire_store.products',$item->product->slug) }}">{{$item->product->name}}</a>
                                    </h3>
                                    <div class="product-price" >
                                        <span class="price">{{number_format($item->price, 2, ',', '.')  }} DA</span>
                                    </div>
                                    <a href="javascript:;" class="btn-product btn-cart-change btn-store-in" data-id="{{$item->id}}" title="Acheter maintenant" {{-- onclick="AddToCart({{$item->id}})" --}}><i class="d-icon-bag mr-2"></i>Ajouter au panier</a>
                                </div>
                                
                            </div>
                       
                    
                           
                        @endforeach
                     
                     
                      
                
                
                      
                    </div>
                </section>