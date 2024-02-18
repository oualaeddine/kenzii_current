<section class="products-wrapper product-list-collection pt-7 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="widget widget-products appear-animate" data-animation-options="{
                    'name': 'fadeInLeftShorter',
                    'delay': '.5s'
                }">
                    <div class="title-wrapper title-underline mb-4">
                        <h2 class="title mb-0">En vedette</h2>
                    </div>
                    <div class="products-col">


                        @foreach ($feautred_added as $item)

                            <div class="product product-list-sm">
                                <figure class="product-media">

                                    <a href="{{ route('dentaire_store.products', $item->product->slug) }}">



                                        @if ($item->product->main_photo != null)

                                            <div class="image_product_cart"
                                                style="background-image: url('{{ asset($item->product->main_photo->link) }}');">

                                            </div>

                                            {{-- <img src="{{asset($item->product->main_photo->link)}}"
                                        alt="product" width="150" height="150"
                                        style="background-color: #f5f5f5;" /> --}}

                                        @else

                                            @if ($item->product->productPhotos()->first() != null)

                                                <div class="image_product_cart"
                                                    style="background-image: url('{{ asset($item->product->productPhotos()->first()->link) }}');">

                                                </div>
                                                {{-- <img src="{{asset($item->product->productPhotos()->first()->link)}}"
                                                alt="product" width="150" height="150"
                                                style="background-color: #f5f5f5;" /> --}}

                                            @else


                                                <div class="image_product_cart"
                                                    style="background-image: url('{{ asset('/product_holder.png') }}');">

                                                </div>

                                                {{-- <img src="{{asset('/product_holder.png')}}"
                                                alt="product" width="150" height="150"
                                                style="background-color: #f5f5f5;" /> --}}

                                            @endif


                                        @endif


                                        {{-- <img src={{asset('dentaire/images/demos/demo-medical/products/1-1.jpg')}} alt="product" width="300"
                                        height="338">
                                    <img src={{asset('dentaire/images/demos/demo-medical/products/1-2.jpg')}} alt="product" width="300"
                                        height="338"> --}}
                                    </a>

                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a
                                            href="{{ route('dentaire_store.products', $item->product->slug) }}">{{ $item->product->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins
                                            class="new-price">{{ number_format($item->price, 2, '.', ',') }} DA</ins>
                                        @if ($item->price_old != 0 && $item->price_old != null)
                                            <del
                                                class="old-price">{{ number_format($item->price_old, 2, '.', ',') }} DA</del>
                                        @endif
                                    </div>
                                    {{-- <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:40%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div> --}}
                                </div>
                            </div>


                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 ">
                <div class="widget widget-products appear-animate" data-animation-options="{
                    'name': 'fadeIn',
                    'delay': '.3s'
                }">
                    <div class="title-wrapper title-underline mb-4">
                        <h2 class="title mb-0">Derniers produits</h2>
                    </div>
                    <div class="products-col">

                        @foreach ($new_added as $item)

                            <div class="product product-list-sm">
                                <figure class="product-media">

                                    <a href="{{ route('dentaire_store.products', $item->product->slug) }}">

                                        @if ($item->product->main_photo != null)

                                            <div class="image_product_cart"
                                                style="background-image: url('{{ asset($item->product->main_photo->link) }}');">

                                            </div>

                                            {{-- <img src="{{asset($item->product->main_photo->link)}}"
                                        alt="product" width="150" height="150"
                                        style="background-color: #f5f5f5;" /> --}}

                                        @else

                                            @if ($item->product->productPhotos()->first() != null)

                                                <div class="image_product_cart"
                                                    style="background-image: url('{{ asset($item->product->productPhotos()->first()->link) }}');">

                                                </div>
                                                {{-- <img src="{{asset($item->product->productPhotos()->first()->link)}}"
                                                alt="product" width="150" height="150"
                                                style="background-color: #f5f5f5;" /> --}}

                                            @else


                                                <div class="image_product_cart"
                                                    style="background-image: url('{{ asset('/product_holder.png') }}');">

                                                </div>

                                                {{-- <img src="{{asset('/product_holder.png')}}"
                                                alt="product" width="150" height="150"
                                                style="background-color: #f5f5f5;" /> --}}

                                            @endif


                                        @endif


                                        {{-- <img src={{asset('dentaire/images/demos/demo-medical/products/1-1.jpg')}} alt="product" width="300"
                                            height="338">
                                        <img src={{asset('dentaire/images/demos/demo-medical/products/1-2.jpg')}} alt="product" width="300"
                                            height="338"> --}}
                                    </a>

                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a
                                            href="{{ route('dentaire_store.products', $item->product->slug) }}">{{ $item->product->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins
                                            class="new-price">{{ number_format($item->price, 2, '.', ',') }} DA</ins>
                                        @if ($item->price_old != 0 && $item->price_old != null)
                                            <del
                                                class="old-price">{{ number_format($item->price_old, 2, '.', ',') }} DA</del>
                                        @endif

                                    </div>
                                    {{-- <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:40%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
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
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="widget widget-products appear-animate" data-animation-options="{
                    'name': 'fadeInRightShorter',
                    'delay': '.5s'
                }">
                    <div class="title-wrapper title-underline mb-4">
                        <h2 class="title mb-0">Meilleur prix</h2>
                    </div>
                    <div class="products-col">


                        @foreach ($best_added as $item)

                            <div class="product product-list-sm">
                                <figure class="product-media">

                                    <a href="{{ route('dentaire_store.products', $item->product->slug) }}">
                                        @if ($item->product->main_photo != null)

                                            <div class="image_product_cart"
                                                style="background-image: url('{{ asset($item->product->main_photo->link) }}');">

                                            </div>

                                            {{-- <img src="{{asset($item->product->main_photo->link)}}"
                                        alt="product" width="150" height="150"
                                        style="background-color: #f5f5f5;" /> --}}

                                        @else

                                            @if ($item->product->productPhotos()->first() != null)

                                                <div class="image_product_cart"
                                                    style="background-image: url('{{ asset($item->product->productPhotos()->first()->link) }}');">

                                                </div>
                                                {{-- <img src="{{asset($item->product->productPhotos()->first()->link)}}"
                                                alt="product" width="150" height="150"
                                                style="background-color: #f5f5f5;" /> --}}

                                            @else


                                                <div class="image_product_cart"
                                                    style="background-image: url('{{ asset('/product_holder.png') }}');">

                                                </div>

                                                {{-- <img src="{{asset('/product_holder.png')}}"
                                                alt="product" width="150" height="150"
                                                style="background-color: #f5f5f5;" /> --}}

                                            @endif


                                        @endif


                                        {{-- <img src={{asset('dentaire/images/demos/demo-medical/products/1-1.jpg')}} alt="product" width="300"
                                        height="338">
                                    <img src={{asset('dentaire/images/demos/demo-medical/products/1-2.jpg')}} alt="product" width="300"
                                        height="338"> --}}
                                    </a>

                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a
                                            href="{{ route('dentaire_store.products', $item->product->slug) }}">{{ $item->product->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins
                                            class="new-price">{{ number_format($item->price, 2, '.', ',') }} DA</ins>
                                        @if ($item->price_old != 0 && $item->price_old != null)
                                            <del
                                                class="old-price">{{ number_format($item->price_old, 2, '.', ',') }} DA</del>
                                        @endif
                                    </div>
                                    {{-- <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div> --}}
                                </div>
                            </div>

                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
