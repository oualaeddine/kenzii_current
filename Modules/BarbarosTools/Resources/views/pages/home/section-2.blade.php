<section class="product-wrapper mb-10 pb-8" style="min-height: 500px">
    <div class="container">
        <div class="toolbox">
            <div class="toolbox-left">
                <ul class="nav-filters product-filters" data-target="#products-grid">
                    <li><a href="{{route('barbarostools')}}" class="@if ($category_selected == null) active-category  @endif  font-weight-semi-bold">All</a></li>
                    @foreach ($categories as $category)

                    <li><a href="{{route('barbarostools',['category' => urlencode($category->name)])}}" class=" font-weight-semi-bold @if ($category_selected == $category->name) active-category  @endif">{{$category->name}}</a>
                    </li>
                        
                    @endforeach
          
                </ul>
                <span class="divider"></span>
                <div class="header-search hs-toggle" >
                    <a href="#" class="search-toggle">
                        <i class="d-icon-search"></i>بحث
                    </a>
                    <form action="{{route('barbarostools')}}" class="input-wrapper" >
                        <input type="text" dir="rtl" class="form-control" name="search" autocomplete="off"
                            placeholder="اكتب إسم المنتج الذي تبحث عنه ..." required value="{{$search}}" />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
                <!-- End of Header Search -->
            </div>
           {{--  <div class="toolbox-right">
                <a href="#" class="btn btn-link  right-sidebar-toggle font-weight-semi-bold mr-0"><i
                        class="d-icon-filter-3"></i>Filter</a>
            </div> --}}
        </div>
        <div class="row grid products-grid mb-2" id="products-grid" data-grid-options="{
            'masonry': {
                'columnWidth': ''
            }
        }">

           {{--  @php
                
                $random_number_array = range(0, 100);
                shuffle($random_number_array);
                $random_number_array = array_slice($random_number_array, 0, 12);
                
            @endphp --}}
            @if ($products->isEmpty())

                <div class="mt-4" style="text-align: center">

                    <img src="/not_data.svg" alt="no_data" style="width:25%">

                    <h4>لم يتم العثور على بيانات</h4>

                </div>
            
                
            @endif

            @foreach ($products as $item)


                <div class="col-md-3 col-sm-4 col-6 grid-item {{-- @foreach ($item->store_product_category as $c) {{$c->category->name}} @endforeach --}}">
                    <div class="product text-center shadow-media cart-full">
                        <figure class="product-media">
                            <a href="{{ route('barbarostools.product.details',$item->product->num) }}">
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
                                <span class="price">{{number_format($item->price, 2, ',', '.')  }} دج</span>
                            </div>
                            <a href="{{ route('barbarostools.checkout',$item->id ) }}" class="btn-product btn-cart-change" title="Acheter maintenant"><i
                                    class="d-icon-bag"></i>أطلب الأن</a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
       {{--  @if ($count_all > 12) --}}

                <div class="text-center" dir="rtl">

                    {{$products->links('pagination::special')}}
                 {{--    <a class="btn btn-outline btn-dark btn-load" id="btn-load" data-count="{{$count_all}}" href="/bt/load_more/1"
                        data-load-to="#products-grid">تحميل المزيد</a> --}}
                </div>
            
       {{--  @endif --}}
    
    </div>
</section>
