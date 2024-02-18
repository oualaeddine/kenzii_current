@extends('OldStoreFront::layouts.template')
@section('content')
    <div class="lx-main">
        <div class="lx-main-content">
            <div class="lx-bloc-title">
                <h3>جديد</h3>
                <p>أحدث المنتوجات المضافة إلى الموقع</p>
            </div>
            <div class="lx-products-list lx-bloc-content">
                <div class="lx-products-items">
                    @foreach($products as $storeProduct)
                        <div class="lx-g4 lx-g5-to-g2">
                            <div class="lx-products-item">
                                <a href="{{$storeProduct->url== null? route('store.product.show',$storeProduct->id):$storeProduct->url }}">
                                    <div class="lx-products-item-img">
                                        <img
                                                src="{{config('app.photos_url')}}{{$storeProduct->product_spec->productPhotos->first()->link ?? 'error.jpg'}}">
                                    </div>
                                    <div class="lx-products-item-detail">
                                        <h2>{{$storeProduct->product_spec->name ?? ''}}</h2>
                                        <p>
                                            <ins>
                                                {{$storeProduct->price ?? ''}}.00 د.ج
                                            </ins>
                                            <br>
                                            <span><small>بالعامية السعر : ( {{$storeProduct->price_txt}} )</small></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="lx-clear-fix"></div>
                    <div class="lx-clear-fix"></div>
                </div>
            </div>
            <div class="lx-clear-fix"></div>
        </div>
    </div>
@endsection




