<div class="product product-single row mb-8 vertical-center">
    <div class="col-md-6">
        <div class="product-gallery" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important">
            <div class="lx-g1">
            <div class="lx-product-images">
                <div class="lx-product-main-img ">

                    @if ($store_product->discount != 0)

                                <div class="product-label-group" >
                                    <label class="product-label label-sale" style="background-color: #FFD700">{{$store_product->discount}} % تخفيض</label>
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
    <div class="col-md-6 sticky-sidebar-wrapper"  dir="rtl">
        <div class="product-details sticky-sidebar">
{{--
            <div class="product-navigation">
                <ul class="breadcrumb breadcrumb-lg mb-2" style="margin: 0;">
                    <li><a href="#"><i class="d-icon-home"></i></a></li>
                    <li><a href="#" class="active">المنتوجات</a></li>
                    <li>تفاصيل</li>
                </ul>
          --}}
{{--       <ul class="product-nav">
                    <li class="product-nav-prev">
                        <a href="#">
                            <i class="d-icon-arrow-left"></i> Prev
                            <span class="product-nav-popup">
                                <img src="{{asset('dentaire/images/product/product-thumb-prev.jpg')}}"
                                    alt="product thumbnail" width="110" height="123">
                                <span class="product-name">Sed egtas Dnte Comfort</span>
                            </span>
                        </a>
                    </li>
                    <li class="product-nav-next">
                        <a href="#">
                            Next <i class="d-icon-arrow-right"></i>
                            <span class="product-nav-popup">
                                <img src="{{asset('dentaire/images/product/product-thumb-next.jpg')}}"
                                    alt="product thumbnail" width="110" height="123">
                                <span class="product-name">Sed egtas Dnte Comfort</span>
                            </span>
                        </a>
                    </li>
                </ul> --}}{{--

            </div>
--}}
            <p style="padding: 0;font-size:3vh;color: #222;font-weight:700">{{$product->name}}</p>
         
            <div class="product-meta">
                رقم المنتج : <span class="product-sku" style="font-size: 12px">{{$product->num}}</span>
                الماركة : <span class="product-brand" >{{$product->brand->name}}</span>
            </div>
            <div class="product-price" style="font-size:3vh;height:8vh" >
                {{number_format($store_product->price, 2, ',', '.')  }}  دج
                @if ($store_product->price_old != null && $store_product->price_old != 0)
                  - <span style="text-decoration: line-through;color:gray">{{number_format($store_product->price_old, 2, ',', '.')  }} دج</span> 
                @endif
                
                <h5 style="font-size:2vh;" class="price price-text fw-bold mt-2">{{$store_product->price_txt}} </h5>
            </div>
        
            {{-- <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width:80%"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
           
            </div> --}}
            <p class="product-short-desc">{{$product->short_description}}</p>
            <hr class="product-divider">

            <form action="{{route('barbarostools.checkout',$store_product->id)}}" method="get">

                <div class="product-form product-qty">
                    <div class="product-form-group" >
                        <div class="input-group ">
                            <button class="quantity-minus d-icon-minus" type="button"></button>
                            
                            <input class="quantity form-control" type="number" name="quantity" min="1" max="1000000">
                          
                            <button class="quantity-plus d-icon-plus"  type="button"></button>

                        </div>

                        <button  class="btn-product btn-cart-special text-normal mr-2 ls-normal font-weight-semi-bold" type="submit">

                            أطلب الأن
  
                            <i class="d-icon-bag"></i>
                          </button>
                    
                    </div>
                </div>



            </form>

           

            <hr class="product-divider mb-3">

            <div class="product-footer" style="  text-align: center;" >

                
                <div class="social-links mr-4">
                    <a href="javascript:;" class="btn-product btn-compare price-text"><i class="d-icon-check icons"></i> منتج اصلي  </a>
                </div>


                <div class="social-links mr-4">
                    <a href="javascript:;" class="btn-product btn-compare price-text"><i class="d-icon-compare icons"></i> توصيل سريع للمنزل  </a>
                </div>

                <div class="social-links mr-4">
                    <a href="tel:{{Config::get('app.phone')}}" target="_blanck" class="btn-product btn-compare price-text" ><i class="d-icon-phone icons"></i> خدمة الزبائن عبر الهاتف ({{Config::get('app.phone')}})</a>
                </div>

            </div>
        </div>
    </div>
</div>
