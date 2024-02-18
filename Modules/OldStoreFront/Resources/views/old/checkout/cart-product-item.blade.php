<tr class="items">
    <td>
        <div class="lx-cart-products-list-img" data-id="93">
            <a href="{{route("store.show",$product->id)}}"> <img src="{{$product->thumb}}"/></a>
        </div>
        <h3>
            <a href="{{route("store.show",$product->id)}}"> {{$product->title}}</a>
        </h3>
    </td>
    <td class="lx-desktop lx-price-total"><strong>{{$product->getPrice()}} دج</strong>
    </td>
</tr>
