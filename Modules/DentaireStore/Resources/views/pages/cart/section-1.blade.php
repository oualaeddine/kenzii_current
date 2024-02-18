<div class="col-lg-8 col-md-12 pr-lg-4">
    <table class="shop-table cart-table">
        <thead>
            <tr>
                <th><span>PRODUIT</span></th>
                <th></th>
                <th><span>Prix</span></th>
                <th><span>quantité</span></th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)

                <tr class="item{{$item->id}}">
                    <td class="product-thumbnail">
                        <figure>
                            <a href="{{route('dentaire_store.products',$item->options->slug)}}">
                                <div class="image_product_cart" style="background-image: url('{{asset($item->options->image)}}');">
                
                                </div>
                            {{--     <img src="{{asset($item->options->image)}}" width="100" height="100"
                                    alt="product"> --}}
                            </a>
                        </figure>
                    </td>
                    <td class="product-name">
                        <div class="product-name-section">
                            <a href="{{route('dentaire_store.products',$item->options->slug)}}">{{$item->name}}</a>
                        </div>
                    </td>
                    <td class="product-subtotal">
                        <span class="amount"> {{number_format($item->price, 2, '.', ',')  }} DA</span>
                    </td>
                    <td class="product-quantity">
                        {{-- <div class="input-group"> --}}
                         
                            {{-- <button class="quantity-minus d-icon-minus"></button> --}}
                          {{--   <input class="quantity form-control" type="number" min="1" value="{{$item->qty}}"
                                max="1000000"> --}}
                                <span style="font-weight: bold">X {{$item->qty}}</span>
                            {{-- <button class="quantity-plus d-icon-plus"></button> --}}
                       {{--  </div> --}}
                    </td>
                    <td class="product-price">
                        <span class="amount">{{$item->price * $item->qty}} DA</span>
                    </td>
                    <td class="product-close">
                        <a href="javascript:;" onclick="DeleteItem({{$item->id}})" class="product-remove" title="Remove this product">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>
                
            @endforeach
          
     
        </tbody>
    </table>
    <div class="cart-actions mb-6 pt-4">
        <a href="{{route('dentaire_store.index')}}" class="btn btn-dark btn-md btn-rounded btn-icon-left mr-4 mb-4"><i class="d-icon-arrow-left"></i>Continuer vos achats</a>
 {{--        <button type="submit" class="btn btn-outline btn-dark btn-md btn-rounded btn-disabled">Update Cart</button> --}}
    </div>
{{--     <div class="cart-coupon-box mb-8">
        <h4 class="title coupon-title text-uppercase ls-m">Coupon Discount</h4>
        <input type="text" name="coupon_code" class="input-text form-control text-grey ls-m mb-4"
            id="coupon_code" value="" placeholder="Enter coupon code here...">
        <button type="submit" class="btn btn-md btn-dark btn-rounded btn-outline">Apply Coupon</button>
    </div> --}}
</div>