<div class="lx-g4 lx-g5-to-g2">
    <div class="lx-products-item">
        <a href="{{route('store.show',$product->id)}}">
            <div class="lx-products-item-img">
                @if ($product->discount != 0))
                <span>{{$product->discount}}%<br/>OFF</span>
                @endif
                <img src="{{$product->thumb}}"/>
            </div>
            <div class="lx-products-item-detail">
                <h2>{{$product->title }}</h2>
                <p>
                    <ins>
                        {{$product->getPrice() }}د.ج
                    </ins>
                </p>
            </div>
        </a>
    </div>
</div>
