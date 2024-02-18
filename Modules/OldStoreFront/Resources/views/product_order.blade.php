@extends('OldStoreFront::layouts.template')
@section('content')
    <div class="lx-main">
        <div class="lx-purchase-btns-floating" style="display: none;">
            <a href="#order" class="lx-add-to-cart" data-id="15">أطلب الآن</a>
        </div>
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
                    @if($storeProduct->discount >0)
                        <p class="lx-product-disaccount">
                            <span>تخفيض:</span> {{$storeProduct->discount }}% </p>@endif
                    <p class="lx-product-price">
                        @if($storeProduct->discount >0)
                            <span>{{$storeProduct->price ?? ''}} د.ج</span>
                        @endif
                        {{$storeProduct->price-$storeProduct->price*$storeProduct->discount/100 ?? ''}} د.ج
                    </p>

                    <div class="lx-purchase-btns">
                        <a href="#order" style="
                                    width:100%;text-align: center;
                                background: #7EC855;
                             display: block;
                            padding: 10px 20px;
                            font-size: 20px;
                            font-weight: bold;
                            text-transform: uppercase;
                            text-align: center;
                            color: #FFFFFF;
                            border-radius: 2px;">أطلب الآن</a>
                    </div>
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

        <div id="order" class="lx-main-content">
            <div class="lx-g2">

                <div class="lx-cart-total">

                    <div class="lx-cart-info-address">
                        <h3>الرجاء ملأ الاستمارة لإتمام الطلب</h3>
                        <form action="{{route('store.orders.store')}}" method="post">
                            @method('post')
                            @csrf
                            <input type="hidden" name="price" id="value"
                                   value="{{$storeProduct->price}}">

                            <input type="hidden" name="delivery_price" id="value" value="0">
                            <input type="hidden" name="product_id" id="value" value="{{$storeProduct->product_id}}">

                            <label><span>الاسم واللقب :</span><input type="text" name="name" placeholder=""
                                                                     value="{{ old('name') }}" required>
                                @error('name')
                                <p style="color: red;">
                                    ادخل اسم ولقب من فضلك
                                </p>
                                @enderror
                            </label>
                            <label><span>الهاتف:</span><input type="tel" name="phone" id="phone" placeholder=""
                                                              value="{{ old('phone') }}">
                                @error('phone')
                                <p style="color: red;">
                                    ادخل رقم هاتفك
                                </p>
                                @enderror</label>

                            <label><span>العنوان:</span><input type="text" name="address" placeholder=""
                                                               value="{{ old('address') }}" required>
                                @error('address')
                                <p style="color: red;">
                                    ادخل العنوان
                                </p>
                                @enderror</label>
                            <label><span>الولاية:</span>
                                <div class="main">
                                    <input type="text" name="wilaya" placeholder="" value="{{ old('wilaya') }}"
                                           minlength="2">
                                </div>
                                @error('wilaya')
                                <p style="color: red;">
                                    ادخل الولاية من فضلك
                                </p>
                                @enderror
                            </label>
                            {{--       <label><span>الكمية:</span>
                                       <div class="main">--}}
                            <input type="hidden" min="1" max="100" name="quantity" placeholder=""
                                   value="1"
                                   minlength="2">
                            {{--     </div>
                                 @error('quantity')
                                 <p style="color: red;">
                                     ادخل الكمية من فضلك
                                 </p>
                                 @enderror
                             </label>--}}
                            <div class="lx-cart-next-step">
                                <input type="submit" style="
                                    width:100%;text-align: center;
                                background: #7EC855;
                             display: block;
                            padding: 10px 20px;
                            font-size: 20px;
                            font-weight: bold;
                            text-transform: uppercase;
                            text-align: center;
                            color: #FFFFFF;
                            border-radius: 2px;" value="أطلب الأن">
                            </div>
                            <div class="lx-clear-fix"></div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="lx-clear-fix"></div>

        </div>

    </div>
@endsection

