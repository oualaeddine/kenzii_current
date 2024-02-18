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

                 $url = route('dentaire_store.categories',$array);

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

                $url_cat = route('dentaire_store.categories',$array);

               @endphp

                <li><a class="  @if ($category_selected == $category->name) active-category font-weight-semi-bold @endif" href="{{$url_cat}}">{{$category->name}}</a></li>

                @endforeach
                
            </ul>
        </div>
        <div class="widget widget-collapsible" style="padding: 5px 15px;">
            <h3 class="widget-title">Filtrer par prix</h3>
            <div class="widget-body mt-3">
                <form action="{{route('dentaire_store.categories')}}" id="filter_form">

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