@extends('OldStoreFront::layouts.template')
@section('content')
    <div class="lx-main">
        <div class="lx-main-content">
            <div class="lx-g2" style="float:left;">
                <div class="lx-product-images">
                    <div class="lx-product-main-img">
                        <img
                            src="{{asset(config('app.photos_url'))}}{{$storeProduct->product->photos->first()->link ?? 'error.jpg'}}"
                            data-nb="0">
                    </div>
                    <ul>
                        @foreach($storeProduct->product->photos as $photo)
                            <li><img src="{{asset(config('app.photos_url').$photo->link) ?? asset('error.jpg')}}"></li>
                        @endforeach
                        <div class="lx-clear-fix"></div>
                    </ul>
                </div>
            </div>
            <div class="lx-g2">
                <div class="lx-product-details">
                    <h1> {{$storeProduct->product->name ?? ''}} </h1>
                    <p class="lx-product-price">  {{$storeProduct->price ?? ''}}.00 د.ج
                        <span><small> ( {{$storeProduct->price_old}} )</small></span>
                    </p>
                    <span><small>بالعامية السعر : ( {{$storeProduct->price_txt}} )</small></span>
                    <form action="{{route('store.orders.index')}}" method="get">
                        @csrf
                        <div class="lx-product-qty">
                            <ins>الكمية:</ins>
                            <span class="lx-minus">-</span>
                            <input type="text" id="qty" name="quantity" data-max="1000" value="1">
                            <span class="lx-plus">+</span>
                        </div>
                        <input type="hidden" name="product_id" value="{{$storeProduct->id}}">
                        <div class="lx-purchase-btns">
                            <input type="submit" class="lx-add-to-cart" value="أطلب الآن" style="
                              width:100%;text-align: center;
                                background: #7EC855;
                             display: block;
                            padding: 10px 20px;
                            font-size: 20px;
                            font-weight: bold;
                            text-transform: uppercase;
                            text-align: center;
                            color: #FFFFFF;
                            border-radius: 2px;">
                        </div>
                    </form>
                    <p class="lx-watching"><abbr>{{rand(100,400)}}</abbr> شخص يشاهد هذا المنتوج حاليا</p>
                    <ul>
                        {{$storeProduct->product->short_description}}
                    </ul>
                    <br>
                    <ul>
                        {!! $storeProduct->product->long_description !!}
                    </ul>
                </div>
            </div>
            <div class="lx-clear-fix"></div>
            <div class="lx-bloc-title"></div>
        </div>
        <div class="lx-popup" style="display: none;">
            <div class="lx-popup-inside">
                <a href="javascript:;"><i class="material-icons lx-remove">close</i></a>
                <a href="javascript:;"><i class="material-icons lx-angle-left"> < </i></a>
                <a href="javascript:;"><i class="material-icons lx-angle-right"> > </i></a>
                <div class="lx-popup-content">
                    <div class="lx-popup-image">
                        <img
                            src="{{config('app.photos_url')}}{{$storeProduct->product->photos->first()->link ?? 'error.jpg'}}"
                            alt="image title here">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


