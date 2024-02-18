@extends('store.template')

@section('content')
    <!-- Main -->
    <div class="lx-main">
        <!-- Main Content -->
        <div class="lx-main-content">
            <form action="" method="post" id="sendcart">
                <div class="lx-g2">
                    <div class="lx-cart-products-list">
                        @if (count($products)>0)
                            <table>
                                @foreach($products as $p)
                                    @include('store.checkout.cart-product-item',['product'=>$product])
                                @endforeach
                            </table>
                            <p class="couponUse"></p>
                            <p class="lx-shipping-costs">مصاريف الشحن : <b class="ship">0,OO د.ج </b>
                            </p>
                            <p class="lx-total-costs">المبلغ الواجب أداؤه :
                                <b class="totalprice">{{$total_price}} دج</b>
                            </p>
                        @else
                            <em>لا توجد اي سلعة في السلة الان</em>
                        @endif
                    </div>
                </div>
                <div class="lx-g2">
                    <div class="lx-cart-total">
                        <div class="lx-cart-info-address">
                            <h3>الرجاء ملأ الاستمارة لإتمام الطلب</h3>
                            <label>
                                <span>الاسم واللقب :</span>
                                <input type="text" name="fullname" placeholder=""/></label>
                            <label>
                                <span>الهاتف:</span><input type="tel" name="phone" placeholder=""/></label>
                            <label><span>العنوان:</span><input type="text" name="address" placeholder=""/></label>
                            <label><span>الولاية:</span>
                                <div class="main">
                                    <input type="text" name="city" placeholder=""/>
                                </div>
                            </label>
                            <div class="lx-cart-next-step">
                                <a href="javascript:" style="width:100%;text-align: center;">أطلب الأن</a>
                            </div>
                            <div class="lx-clear-fix"></div>
                        </div>
                    </div>
                </div>
                <div class="lx-clear-fix"></div>
            </form>
        </div>
    </div>
@endsection
