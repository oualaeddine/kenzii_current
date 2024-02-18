@extends('store.template')

@section('content')
    <!-- Main -->
    <div class="lx-main">
        <!-- Main Content -->
        <div class="lx-main-content">
            <div class="lx-bloc-title">
                <h3>جديد</h3>
                <p>أحدث المنتوجات المضافة إلى الموقع</p>
            </div>
            <div class="lx-products-list lx-bloc-content">
                <div class="lx-products-items">
                    @for($i=0;$i<count($products);$i++)
                        @include('store.landing.product-item',['product'=>$products[$i]])
                        @if (($i+1)%4==0)
                            <div class='lx-clear-fix'></div>
                        @endif
                    @endfor
                    <div class="lx-clear-fix"></div>
                </div>
            </div>
            <div class="lx-clear-fix"></div>
        </div>
    </div>
@endsection
