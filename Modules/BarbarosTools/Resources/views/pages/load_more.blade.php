
            @foreach ($products as $item)


              
            <div class="col-md-3 col-sm-4 col-6 grid-item  @foreach ($item->store_product_category as $c) {{$c->category->name}} @endforeach">
                <div class="product text-center shadow-media cart-full">
                    <figure class="product-media">
                        <a href="{{ route('barbarostools.product', str_replace(' ', '-',$item->product->name)) }}">
                            @if ($item->product->main_photo != null)
    
                                 <div class="image_product" style="background-image: url('{{ $item->product->main_photo->link }}');">
    
                                 </div>
                              {{--   <img src="{{ asset($item->product->main_photo->link) }}" alt="product" width="280" height="315" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;"> --}}
    
                            @else
    
                                   @if ($item->product->productPhotos()->first() != null)
    
                                   <div class="image_product" style="background-image: url('{{ $item->product->productPhotos()->first()->link  }}');">
    
                                   </div>
    
    
                                   @else
    
                                   <div class="image_product" style="background-image: url('product_holder.png');">
    
                                   </div>
    
                                   
                                   @endif
                                
    
                            @endif
                        </a>
                        
                            @if ($item->discount != 0)

                                    <div class="product-label-group" >
                                        <label class="product-label label-sale" style="background-color: #FFD700">{{$item->discount}} % -</label>
                                    </div>
                                
                            @endif
                     
                        <div class="product-action-vertical">

                        </div>
                        <div class="product-action">
                            <a href="{{ route('barbarostools.product', str_replace(' ', '-',$item->product->name)) }}"
                                class="btn-product" title="Afficher les Détails">عرض التفاصيل</a>
                        </div>
                    </figure>
                    <div class="product-details">
                     {{--    <div class="product-cat">
                            <a href="shop-grid-3cols.html">Électronique</a>
                        </div> --}}
                        <h3 class="product-name" dir="rtl">
                            <a href="{{ route('barbarostools.product', str_replace(' ', '-',$item->product->name)) }}">{{$item->product->name}}</a>
                        </h3>
                        <div class="product-price" dir="rtl">
                            <span class="price">{{number_format($item->price, 2, ',', '.')  }} دج</span>
                        </div>
                        <a href="{{ route('barbarostools.checkout',$item->id ) }}" class="btn-product btn-cart-change" title="Acheter maintenant"><i
                                class="d-icon-bag"></i>أطلب الأن</a>
                    </div>
                </div>
            </div>

            @endforeach

