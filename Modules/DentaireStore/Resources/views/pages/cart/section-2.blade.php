<aside class="col-lg-4 sticky-sidebar-wrapper">
    <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
        <div class="summary mb-4">
            <h3 class="summary-title text-left">Totaux du panier</h3>
            <table class="shipping">
                <tr class="summary-subtotal">
                    <td>
                        <h4 class="summary-subtitle">Sous-total</h4>
                    </td>
                    <td>
                        <p class="summary-subtotal-price"><span class="cart-price-span">{{Cart::subtotal()}}</span> DA</p>
                    </td>												
                </tr>
              {{--   <tr class="sumnary-shipping shipping-row-last">
                    <td colspan="2">
                        <h4 class="summary-subtitle">Calculate Shipping</h4>
                        <ul>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="flat_rate" name="shipping" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="flat_rate">domicile</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                    <label class="custom-control-label" for="free-shipping">stop desk</label>
                                </div>
                            </li>

                        </ul>
                    </td>
                </tr> --}}
            </table>
         {{--    <div class="shipping-address">
                <label>Shipping to <strong>CA.</strong></label>
                <div class="select-box">
                    <select name="country" class="form-control">
                        <option value="us" selected>United States (US)</option>
                        <option value="uk"> United Kingdom</option>
                        <option value="fr">France</option>
                        <option value="aus">Austria</option>
                    </select>
                </div>
                <div class="select-box">
                    <select name="country" class="form-control">
                        <option value="us" selected>California</option>
                        <option value="uk">Alaska</option>
                        <option value="fr">Delaware</option>
                        <option value="aus">Hawaii</option>
                    </select>
                </div>
                <input type="text" class="form-control" name="code" placeholder="Town / City" />
                <input type="text" class="form-control" name="code" placeholder="ZIP" />
                <a href="#" class="btn btn-md btn-dark btn-rounded btn-outline">Update totals</a>
            </div> --}}
            <table class="total">
                <tr class="summary-subtotal">
                    <td>
                        <h4 class="summary-subtitle">Total</h4>
                    </td>
                    <td>
                        <p class="summary-total-price ls-s"><span class="cart-price-span">{{Cart::subtotal()}}</span> DA</p>
                    </td>												
                </tr>
            </table>
            <a href="{{route('dentaire_store.checkout')}}" class="btn btn-dark btn-rounded btn-checkout">Passez à la caisse</a>
        </div>
    </div>
</aside>