@extends('OldStoreFront::layouts.template')
@section('content')
    <div class="lx-main">
        <div class="lx-main-content">
            <form action="" method="post" id="sendcart">
                <div class="lx-g2">
                    <div class="lx-cart-products-list">
                        <table cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr class="items">
                                <td>
                                    <div class="lx-cart-products-list-img" data-id="93">
                                        <a href="">
                                            <img
                                                src="{{asset(config('app.photos_url'))}}{{$storeProduct->product->photos->first()->link ??'error.jpg'}}"></a>
                                    </div>
                                    <h3>
                                        <a href="{{route('store.products.show',$storeProduct->id)}}">{{$storeProduct->product->name}}</a>
                                    </h3>

                                </td>
                                <td class="lx-desktop lx-price-total"><strong>{{$storeProduct->price*$quantity ?? ''}}
                                        د.ج </strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="couponUse"></p>
                        <p class="lx-shipping-costs">مصاريف الشحن : <b class="ship">{{0}} د.ج </b></p>
                        <p class="lx-total-costs">المبلغ الواجب أداؤه : <b
                                class="totalprice">{{$storeProduct->price*$quantity ?? ''}}
                                د.ج </b></p>
                    </div>
                </div>
                <div class="lx-g2">
                    <form action="{{route("store.orders.store")}}" method="post">

                        @csrf
                        <input type="hidden" name="price" id="value"
                               value="{{$storeProduct->price}}">

                        <input type="hidden" name="delivery_price" id="value" value="0">
                        <input type="hidden" name="product_id" id="value" value="{{$storeProduct->product->id}}">
                        <div class="lx-cart-total">

                            <div class="lx-cart-info-address">
                                <h3>الرجاء ملأ الاستمارة لإتمام الطلب</h3>

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
                                {{--  <label><span>الكمية:</span>
                                      <div class="main">--}}
                                <input type="hidden" min="1" max="100" name="quantity" placeholder="" value="1"
                                       minlength="2">
                                {{--  </div>
                                  @error('quantity')
                                  <p style="color: red;">
                                      ادخل الكمية من فضلك
                                  </p>
                                  @enderror
                              </label>--}}
                                <div class="lx-cart-next-step">
                                    <a style="
                                    width:100%;text-align: center;
                                background: #7EC855;
                             display: block;
                            padding: 10px 20px;
                            font-size: 20px;
                            font-weight: bold;
                            text-transform: uppercase;
                            text-align: center;
                            color: #FFFFFF;
                            border-radius: 2px;">أطلب الأن
                                    </a></div>
                                <div class="lx-clear-fix"></div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="lx-clear-fix"></div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        fbq('track', 'InitiateCheckout');            snaptr('track', 'START_CHECKOUT');


        console.log("InitiateCheckout")
    </script>
@endsection
