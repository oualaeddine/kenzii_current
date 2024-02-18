<footer class="footer non-printable">
    <div class="container">
        <div class="footer-middle">
            <div class="row pt-2">
                <div class="col-lg-2 d-flex align-items-center">
                    <a href="{{route('dentaire_store.index')}}" class="logo-footer">
                        <img src={{asset('logo_hw.png')}} alt="logo-footer" width="154"
                            height="43" />
                    </a>
                </div>
                <div class="col-lg-3 col-contact col-md-6">
                    <div class="widget widget-contact">
                        <h4 class="widget-title">Prendre contact</h4>
                        <ul class="widget-body">
                            <li>
                                <label>Téléphone</label>
                                @if ($settings->contains('name','phone'))
                                    <a href="tel:{{$settings->where('name','phone')->first()->value}}">{{$settings->where('name','phone')->first()->value}} {{-- {{$settings->email}} --}}</a> 
                                    @else
                                    <a href="tel:#">0606060606{{-- {{$settings->phone}} --}}</a>
                                @endif
                              
                            </li>
                            <li>
                                <label>Email</label>
                                @if ($settings->contains('name','email'))
                                    <a href="mailto:{{$settings->where('name','email')->first()->value}}">{{$settings->where('name','email')->first()->value}} {{-- {{$settings->email}} --}}</a> 
                                @else
                                <a href="mailto:Contact@mail.com">Contact@mail.com {{-- {{$settings->email}} --}}</a>
                                @endif

                              
                            </li>
                      {{--       <li>
                                <label>Address</label>
                                <a href="#">123 Street, City, England </a>
                            </li> --}}
                            <li>
                                <label>JOURS / HEURES DE TRAVAIL</label>
                                 @if ($settings->contains('name','work_h'))
                                         <p>{{$settings->where('name','work_h')->first()->value}}</p> 
                                 @else
                                        <p>Mon - Sun / 9:00 AM - 8:00 PM {{-- {{$settings->work_h}} --}}</p> 
                                 @endif
                                
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-account col-md-6">
                    <div class="widget">
                        <h4 class="widget-title">Mon compte</h4>
                        @php

                          $data = $settings->where('group','about_links')->values();
                             
                        @endphp

                        <ul class="widget-body">
                            @foreach ($data as $item)
                                <li>
                                    <a href="{{$item->value}}">{{$item->name}}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                 {{--    <div class="widget widget-newsletter form-wrapper">
                        <div class="newsletter-info">
                            <h4 class="widget-title">Subscribe Newsletter</h4>
                            <p>Subscribe to Product eCommerce newsletter to receive timely updates from your
                                favourite products.</p>
                        </div>
                        <form action="#" class="input-wrapper input-wrapper-inline">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email address here..." required />
                            <button class="btn btn-primary btn-rounded btn-md ml-2" type="submit">subscribe<i
                                    class="d-icon-arrow-right"></i></button>
                        </form>
                    </div> --}}
                    <div class="social-links">
                        <a href="{{$settings->where('name','fb_link')->first()->value}}" class="social-link social-facebook fab fa-facebook-f"></a>
                        <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                        <a href="{{$settings->where('name','ig_link')->first()->value}}" class="social-link social-instagram fab fa-instagram"></a>
                        <a href="#" class="social-link social-google fab fa-google-plus-g"></a>
                        <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End FooterMiddle -->
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">E-commerce &copy; 2021 {{-- Product Store.  --}}Tous droits réservés.</p> ecommerce
            </div>
            <div class="footer-right">
                <p class="copyright">This site is not part of the Facebook website or Facebook Inc. Additionally, this site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</p>

               {{--  <figure class="d-flex">
                    <img src={{asset('dentaire/images/demos/demo-medical/payment.png')}} alt="payment" width="272" height="20">
                </figure> --}}
            </div>
        </div>
    </div>
    <!-- End FooterBottom -->
</footer>
<!-- End Footer -->