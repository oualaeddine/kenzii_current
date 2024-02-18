{{-- <main class="main"> --}}

    
    <div class="page-header"
        style=" background-color: #7a32ff;">
        <h3 class="page-subtitle">مرحبا بك في متجرنا</h3>
        <h1 class="page-title">معرض المنتجات</h1>
        <ul class="breadcrumb" dir="rtl">
            <li><a href="{{route('barbarostools')}}"><i class="d-icon-home"></i></a></li>
            <li class="delimiter">/</li>
            <li>المتجر</li>
        </ul>
    </div>
    <!-- End PageHeader -->
    <div class="page-content mb-10 pb-6">
        <div class="container">
            <div class="row gutter-lg main-content-wrap">
                <aside
                    class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                    <div class="sidebar-content" style="padding: 0;padding-top:10px">
                        <div class="sticky-sidebar" data-sticky-options="{'top': 10}">
                            <div class="filter-actions mb-4">
                                <a href="#"
                                    class="sidebar-toggle-btn toggle-remain btn btn-outline btn-primary btn-rounded btn-icon-right">Filtre<i
                                        class="d-icon-arrow-left"></i></a>
                                {{-- <a href="#" class="filter-clean">Nettoie Tous</a> --}}
                            </div>
                            <div class="widget widget-collapsible" style="padding: 5px 15px;">
                                <h3 class="widget-title">Catégories</h3>
                                <ul class="widget-body filter-items search-ul">

                                    @php

                                     $array = [];

                                     if($nbr_pages != 12){
                                        $array['nbr_pages'] = $nbr_pages;
                                     }
                  
                                     if($price_lower != 1000.00 || $price_upper != 150000.00){
                                        $array['price_lower'] = $price_lower;
                                        $array['price_upper'] = $price_upper;
                                     }

                                     if($sort_by != null){
                                        $array['tp'] = $sort_by;
                                     }
                                     
                                     if($search){
                                        $array['search'] = $search;
                                     }

                                     if($current_brand){
                                        $array['brand'] = $current_brand;
                                      }

                                     $url = route('barbarostools.shop',$array);

                                    @endphp


                                    <li><a class="  @if ($category_selected == null) active-category font-weight-semi-bold @endif" href="{{$url}}">Tout</a></li>

                                    @foreach ($categories as $category)

                                  {{--   @if ()
                                        
                                    @endif --}}

                                    @php

                                    $array = [];

                                    $array['category'] = urlencode($category->name);

                                    if($nbr_pages != 12){
                                       $array['nbr_pages'] = $nbr_pages;
                                    }
                 
                                    if($price_lower != 1000.00 || $price_upper != 150000.00){
                                       $array['price_lower'] = $price_lower;
                                       $array['price_upper'] = $price_upper;
                                    }

                                    if($sort_by != null){
                                       $array['tp'] = $sort_by;
                                    }
                                    
                                    if($search){
                                        $array['search'] = $search;
                                    }

                                    if($current_brand){
                                        $array['brand'] = $current_brand;
                                    }
                                    
                                   /*  dd( $array['brand'] ); */

                                    $url_cat = route('barbarostools.shop',$array);

                                   @endphp

                                    <li><a class="  @if ($category_selected == $category->name) active-category font-weight-semi-bold @endif" href="{{$url_cat}}">{{$category->name}}</a></li>

                                    @endforeach
                                    
                                </ul>
                            </div>
                            <div class="widget widget-collapsible" style="padding: 5px 15px;">
                                <h3 class="widget-title">Filtrer par prix</h3>
                                <div class="widget-body mt-3">
                                    <form action="{{route('barbarostools.shop')}}" id="filter_form">

                                        <input type="hidden" name="price_lower" id="price_lower">
                                        <input type="hidden" name="price_upper" id="price_upper">

                                        <input type="hidden" name="category" value="{{$category_selected}}" >

                                        <div class="filter-price-slider" id="slider"></div>

                                        <div class="filter-actions">
                                            <div class="filter-price-text mb-4 mt-4">Prix:
                                                <span class="filter-price-range" ></span>
                                            </div>
                                           {{--  <button type="submit"
                                                class="btn btn-dark btn-filter btn-rounded" id="submit-price-filter">Filtre</button> --}}
                                        </div>
                                    {{-- </form> --}}<!-- End Filter Price Form -->
                                </div>
                            </div>
                        {{--     <div class="widget widget-collapsible">
                                <h3 class="widget-title">Size</h3>
                                <ul class="widget-body filter-items">
                                    <li><a href="#">Extra Large</a></li>
                                    <li><a href="#">Large</a></li>
                                    <li><a href="#">Medium</a></li>
                                    <li><a href="#">Small</a></li>
                                </ul>
                            </div> --}}
                         {{--    <div class="widget widget-collapsible">
                                <h3 class="widget-title">Color</h3>
                                <ul class="widget-body filter-items">
                                    <li><a href="#">Black</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Green</a></li>
                                    <li><a href="#">White</a></li>
                                </ul>
                            </div> --}}
                            <div class="widget widget-collapsible" style="padding: 5px 15px;">
                                <h3 class="widget-title">Marque</h3>
                                <ul class="widget-body filter-items">

                                    @foreach ($brands as $brand)

                                        <li id="Brand-{{$brand->id}}" data-id="{{$brand->id}}" onclick="SelectBrand({{$brand->id}})" class="@if(in_array($brand->id,$current_brand)) active @endif brand" >  <a> {{$brand->name}}  </a> </li>

                                    @endforeach
                                   

                                </ul>


                                    <div class="filter-actions">
                                    
                                        <button type="submit"
                                            class="btn btn-dark btn-filter btn-rounded" id="submit-price-filter">Filtre</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </aside>
                <div class="col-lg-9 main-content">
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#"
                                class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary 
                                    btn-rounded btn-icon-right d-lg-none">Filtre<i
                                    class="d-icon-arrow-right"></i></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label  style="display: inline-block">Trier par :</label>
                                <select name="orderby" class="form-control" id="orderby">
                                    <option value="" @if ($sort_by == null) selected @endif>Défaut</option>
                                    <option value="order_desc"  @if ($sort_by == 'order_desc') selected @endif>Dernière</option>
                                    <option value="price_up" @if ($sort_by == 'price_up') selected @endif>Trier prix à terme bas</option>
                                    <option value="price_down" @if ($sort_by == 'price_down') selected @endif>Trier le prix à terme haut</option>
                                </select>
                            </div>
                            <span class="divider"></span>
                            <div class="header-search hs-toggle" >
                                <a href="#" class="search-toggle">
                                    <i class="d-icon-search"></i>بحث
                                </a>
                                <form action="{{route('barbarostools.shop')}}" class="input-wrapper" >
                                    <input type="text" dir="rtl" class="form-control" name="search" autocomplete="off"
                                        placeholder="اكتب إسم المنتج الذي تبحث عنه ..." required id="search"  value="{{$search}}"/>
                                    <button class="btn btn-search" type="submit">
                                        <i class="d-icon-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box text-dark">
                                <label style="display: inline-block" >Afficher :</label>
                                <select name="count" class="form-control" id="count_pages">
                                    <option value="12" @if ($nbr_pages == 12 ) selected @endif>12</option>
                                    <option value="24" @if ($nbr_pages == 24 ) selected @endif>24</option>
                                    <option value="36" @if ($nbr_pages == 36 ) selected @endif>36</option>
                                </select>
                            </div>
                          {{--   <div class="toolbox-item toolbox-layout">
                                <a href="shop-list.html" class="d-icon-mode-list btn-layout"></a>
                                <a href="shop.html" class="d-icon-mode-grid btn-layout active"></a>
                            </div> --}}
                        </div>
                    </nav>


                        <div id="loading_sec" style="text-align: center; display:none" >

                            <img src="{{asset('loading.gif')}}" alt="">

                        </div>
                  

                        @if ($products->isEmpty())

                        <div class="row cols-12 cols-sm-12 product-wrapper" style="text-align: center" id="products_page">

                        <div class="product-wrap">
                            <div class="product">
                                <div class="mt-4" >
                
                                    <img src="/not_data.svg" alt="no_data" style="width:40%">
                
                                    <h4>لم يتم العثور على بيانات</h4>
                
                                </div>
                            </div>
                        </div>

                        @else
                        
                                <div class="row cols-2 cols-sm-3 product-wrapper" style="text-align: center" id="products_page">
                    
                        @endif


                        @foreach ($products as $item)

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ route('barbarostools.product.details',$item->product->num) }}">
                                            @if ($item->product->main_photo != null)
                    
                                                 <div class="image_product" style="background-image: url('{{ asset($item->product->main_photo->link) }}');" >
                    
                                                 </div>
                                              {{--   <img src="{{ asset($item->product->main_photo->link) }}" alt="product" width="280" height="315" style="box-shadow:0 .5rem 1rem rgba(0,0,0,.15)!important;"> --}}
                    
                                            @else
                    
                                                   @if ($item->product->productPhotos()->first() != null)
                    
                                                        <div class="image_product" style="background-image: url('{{ asset($item->product->productPhotos()->first()->link) }}');" >
                            
                                                        </div>
                    
                    
                                                   @else
                    
                                                        <div class="image_product" style="background-image: url({{asset('/product_holder.png')}});" >
                            
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
                                            
                                            <a href="{{ route('barbarostools.checkout',$item->id ) }}" class="btn-product-icon " title="أطلب الأن"><i
                                                    class="d-icon-bag"></i></a>
                                        </div>

                                        <div class="product-action">
                                            <a href="{{ route('barbarostools.product.details',$item->product->num) }}"
                                                class="btn-product" title="Afficher les Détails">عرض التفاصيل</a>
                                        </div>
                                    </figure>
                                    <div class="product-details" style="text-align: center">
                                       {{--  <div class="product-cat">
                                            <a href="shop-grid-3col.html">Bags & Backpacks</a>
                                        </div> --}}
                                        <h3 class="product-name" dir="rtl">
                                            <a href="{{ route('barbarostools.product.details',$item->product->num) }}">{{$item->product->name}}</a>
                                        </h3>
                                      {{--   <div class="product-price">
                                            <ins class="new-price">$125.99</ins><del class="old-price">$160.99</del>
                                        </div> --}}
                                        <div class="product-price" dir="rtl">
                                            <span class="price">{{number_format($item->price, 2, ',', '.')  }} دج</span>
                                        </div>
                                      {{--   <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:60%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product.html" class="rating-reviews">( 8 reviews )</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                        @endforeach
                  
                        
                    </div>
                    <nav class="toolbox toolbox-pagination" id="pagination_nav">
                        <p class="show-info">Affichage <span>{{$products->count()}} de {{$products->total()}}</span> Des produits</p>
                         {{$products->links('pagination::special')}}
                       {{--  <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <i class="d-icon-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next<i class="d-icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul> --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
{{-- </main> --}}