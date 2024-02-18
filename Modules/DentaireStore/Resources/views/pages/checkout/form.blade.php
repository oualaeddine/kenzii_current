<form action="{{ route('dentaire_store.checkout.store') }}" class="form" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
            <h3 class="title title-simple text-left text-uppercase">DÉTAILS DE FACTURATION</h3>
            <div class="row">
                <div class="col-xs-6">
                    <label>Prénom *</label>
                    <input type="text" class="form-control" name="first_name" required="" />
                </div>
                <div class="col-xs-6">
                    <label>Nom de famille *</label>
                    <input type="text" class="form-control" name="last_name" required="" />
                </div>
            </div>
         {{--    <label>Company Name (Optional)</label>
            <input type="text" class="form-control" name="company-name" required="" />
            <label>Country / Region *</label>
            <div class="select-box">
                    <select name="country" class="form-control">
                        <option value="us" selected>United States (US)</option>
                        <option value="uk"> United Kingdom</option>
                        <option value="fr">France</option>
                        <option value="aus">Austria</option>
                    </select>
                </div> --}}
       {{--      <label>Street Address *</label>
            <input type="text" class="form-control" name="address1" required=""
                placeholder="House number and street name" />
            <input type="text" class="form-control" name="address2" required=""
                placeholder="Apartment, suite, unit, etc. (optional)" /> --}}
           {{--  <div class="row">
                <div class="col-xs-6">
                    <label>Town / City *</label>
                    <input type="text" class="form-control" name="city" required="" />
                </div>
                <div class="col-xs-6">
                    <label>State *</label>
                    <input type="text" class="form-control" name="state" required="" />
                </div>
            </div> --}}
         {{--    <div class="row">
                <div class="col-xs-6">
                    <label>ZIP *</label>
                    <input type="text" class="form-control" name="zip" required="" />
                </div>
                <div class="col-xs-6">
                    <label>Phone *</label>
                    <input type="text" class="form-control" name="phone" required="" />
                </div>
            </div> --}}
            <div class="row">
                <div class="col-xs-6">
                    <label>Numéro de téléphone  *</label>
                    <input type="text" class="form-control" name="phone" required="" />
                </div>
                <div class="col-xs-6">
                    <label>Adresse  *</label>
                    <input type="text" class="form-control" name="adresse" required="" />
                </div>
            </div>
           
          {{--   <div class="form-checkbox mb-0">
                <input type="checkbox" class="custom-checkbox" id="create-account"
                    name="create-account">
                <label class="form-control-label ls-s" for="create-account">Create an account?</label>
            </div> --}}
         {{--    <div class="form-checkbox mb-6">
                <input type="checkbox" class="custom-checkbox" id="different-address"
                    name="different-address">
                <label class="form-control-label ls-s" for="different-address">Ship to a different
                    address?</label>
            </div> --}}
            {{-- <h2 class="title title-simple text-uppercase text-left">Informations complémentaires</h2>
            <label>Order Notes (Optional)</label>
            <textarea class="form-control pb-2 pt-2 mb-0" cols="30" rows="5"
                placeholder="Notes about your order, e.g. special notes for delivery"></textarea> --}}
        </div>
        <aside class="col-lg-5 sticky-sidebar-wrapper">
            <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                <div class="summary pt-5">
                    <h3 class="title title-simple text-left text-uppercase">Votre commande</h3>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)

                                <tr>
                                    <td class="product-name">{{$item->name}}<span
                                            class="product-quantity">×&nbsp;{{$item->qty}}</span></td>
                                    <td class="product-total text-body">{{number_format($item->price, 2, '.', ',')  }} DA</td>
                                </tr>
                                
                            @endforeach
                         

                            <tr class="summary-subtotal">
                                <td>
                                    <h4 class="summary-subtitle">Sous-total</h4>
                                </td>
                                <td class="summary-subtotal-price pb-0 pt-0"> {{$cart_sub_total}} DA
                                </td>
                            </tr>
                            <tr class="sumnary-shipping shipping-row-last">
                                <td colspan="2">
                                    <h4 class="summary-subtitle">Calculer l'expédition</h4>
                                    <ul>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="flat_rate" name="shipping" value="domicile" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="flat_rate">domicile</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" value="stop desk" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">stop desk</label>
                                            </div>
                                        </li>
            
                                    </ul>
                                </td>
                            </tr>
                            <tr class="summary-total">
                                <td class="pb-0">
                                    <h4 class="summary-subtitle">Total</h4>
                                </td>
                                <td class=" pt-0 pb-0">
                                    <p class="summary-total-price ls-s text-primary">{{$cart_sub_total}} DA</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  {{--   <div class="payment accordion radio-type">
                        <h4 class="summary-subtitle ls-m pb-3">Payment Methods</h4>
                        <div class="card">
                            <div class="card-header">
                                <a href="#collapse1" class="collapse text-body text-normal ls-m">Check payments
                                </a>
                            </div>
                            <div id="collapse1" class="expanded" style="display: block;">
                                <div class="card-body ls-m">
                                    Please send a check to Store Name, Store Street, 
                                    Store Town, Store State / County, Store Postcode.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a href="#collapse2" class="expand text-body text-normal ls-m">Cash on delivery</a>
                            </div>
                            <div id="collapse2" class="collapsed">
                                <div class="card-body ls-m">
                                    Pay with cash upon delivery.
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-checkbox mt-4 mb-5">
                        <input type="checkbox" class="custom-checkbox" id="terms-condition"
                            name="terms_condition" value="Agreed On Terms" required="" />
                        <label class="form-control-label" for="terms-condition">
                            J'ai lu et j'accepte le site web <a href="#">termes et conditions </a>*.
                        </label>
                    </div>
                    @if (Cart::count() != 0)
                        <button type="submit" class="btn btn-dark btn-rounded btn-order">Passer la commande</button> 
                    @endif
                    
                </div>
            </div>
        </aside>
    </div>
</form>