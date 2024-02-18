@extends('store.template')
@section('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('store/css/hobrt.css')}}">
    <!-- Main -->
@endsection
@section('content')
    <div class="lx-main">
        <!-- Main Content -->
        <div class="lx-main-content">
            <div class="lx-g2" style="float:left;">
                <div class="lx-product-images">
                    <div class="lx-product-main-img">
                        <img src="{{$product->thumb}}" data-nb="0"/>
                    </div>
                    <ul>
                        @foreach($images as $img)
                            <li><img src="{{$img->url}}" alt=""/></li>
                        @endforeach
                        <div class="lx-clear-fix"></div>
                    </ul>
                </div>
            </div>
            <div class="lx-g2">
                <div class="lx-product-details">
                    <h1> {{$product->title}}</h1>
                    @if ($product->discount>0)
                        <p class="lx-product-disaccount">
                            <span>تخفيض:</span> {{$product->discount}} % </p>
                        <p class="lx-product-price"><span>{{$product->price}} د.ج </span> {{$product->getPrice()}}د.ج
                        </p>
                    @else
                        <p class="lx-product-price">{{$product->price}} د.ج </p>
                    @endif
                    <div class="lx-product-qty">
                        <ins>الكمية:</ins>
                        <span class="lx-minus">-</span>
                        <input type="text" id="qty" name="qty" data-max="1000" value="1"/>
                        <span class="lx-plus">+</span>
                    </div>
                    <div class="lx-purchase-btns">
                        <a href="{{route('store.buy',$product->id)}}" class="lx-add-to-cart">أطلب الآن</a>
                    </div>
                    <div class="lx-purchase-btns-floating">
                        <a href="{{route('store.buy',$product->id)}}" class="lx-add-to-cart">أطلب الآن</a>
                    </div>
                    <p class="lx-watching"><abbr><?php echo rand(100, 200); ?></abbr> شخص يشاهد هذا المنتوج حاليا</p>
                    <ul>
                        {{$product->description}}
                    </ul>
                </div>
            </div>
            <div class="lx-clear-fix"></div>
            <div class="lx-bloc-title"></div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
@endsection
