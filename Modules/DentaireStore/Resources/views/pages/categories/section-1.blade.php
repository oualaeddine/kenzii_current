<div class="row gutter-lg main-content-wrap">
  
     @include('dentairestore::pages.categories.section-2')
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
               {{--  <span class="divider"></span> --}}
              {{--   <div class="header-search hs-toggle" >
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
                </div> --}}
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
                            <a href="{{ route('dentaire_store.products',$item->product->slug) }}">
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
                                            <label class="product-label label-sale" style="background-color: #36098B">{{$item->discount}} % -</label>
                                        </div>
                                    
                                @endif


                         
                            <div class="product-action-vertical">
                                
                                <a href="javascript:;" {{-- onclick="AddToCart({{$item->id}})"  --}}class="btn-product-icon btn-cart btn-store-in" data-id="{{$item->id}}" data-toggle="modal"
                                    data-target="#addCartModal" title="Ajouter au panier">
                                    <i class="d-icon-bag"></i></a>

                            </div>

                            <div class="product-action">
                                
                                <a href="{{route('dentaire_store.products',$item->product->slug)}}" class="btn-product" title="Quick View">Aperçu rapide</a>

                            </div>
                        </figure>
                        <div class="product-details" style="text-align: center">
                           {{--  <div class="product-cat">
                                <a href="shop-grid-3col.html">Bags & Backpacks</a>
                            </div> --}}
                            <h3 class="product-name" dir="rtl">
                                <a href="{{ route('dentaire_store.products',$item->product->slug) }}">{{$item->product->name}}</a>
                            </h3>
                          {{--   <div class="product-price">
                                <ins class="new-price">$125.99</ins><del class="old-price">$160.99</del>
                            </div> --}}
                            <div class="product-price">
                                <span class="price">{{number_format($item->price, 2, ',', '.')  }} DA</span>
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
             {{$products->links('pagination::special_dentaire')}}
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