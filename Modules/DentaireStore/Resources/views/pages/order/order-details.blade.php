<h2 class="title title-simple text-left pt-4 font-weight-bold text-uppercase">DÉTAILS DE LA COMMANDE</h2>
<div class="order-details">
    <table class="order-details-table">
        <thead>
            <tr class="summary-subtotal">
                <td>
                    <h3 class="summary-subtitle">Produit</h3>
                </td>
                <td></td>
            </tr>
        </thead>
        <tbody>

            @foreach ($details as $item)

                    <tr>
                        <td class="product-name">{{$item->product->name}}<span> <i class="fas fa-times"></i>
                            {{$item->quantity}}</span></td>
                        <td class="product-price"> {{number_format($item->price, 2, '.', ',')}} DA</td>
                    </tr>
                
            @endforeach
            
          {{--   <tr>
                <td class="product-name">Best dark blue pedestrian <span><i
                            class="fas fa-times"></i> 1</span></td>
                <td class="product-price">DA 100.00</td>
            </tr> --}}
       
            <tr class="summary-subtotal">
                <td>
                    <h4 class="summary-subtitle">Sous-total:</h4>
                </td>
                <td class="summary-subtotal-price"> {{number_format($total_all, 2, '.', ',')}} DA</td>
            </tr>
         {{--    <tr class="summary-subtotal">
                <td>
                    <h4 class="summary-subtitle">Expédition:</h4>
                </td>
                <td class="summary-subtotal-price">Expédition gratuite</td>
            </tr> --}}
            <tr class="summary-subtotal">
                <td>
                    <h4 class="summary-subtitle">Expédition:</h4>
                </td>
                <td class="summary-subtotal-price">{{$order->shipping}}</td>
            </tr>
            <tr class="summary-subtotal">
                <td>
                    <h4 class="summary-subtitle">Total:</h4>
                </td>
                <td>
                    <p class="summary-total-price">{{number_format($total_all, 2, '.', ',')}} DA</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>