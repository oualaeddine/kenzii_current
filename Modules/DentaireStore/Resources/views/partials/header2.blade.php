{{-- <header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome to Product store message or remove it!</p>
            </div>
            <div class="header-right">
                <div class="dropdown">
                    <a href="#currency">USD</a>
                    <ul class="dropdown-box">
                        <li><a href="#USD">USD</a></li>
                        <li><a href="#EUR">EUR</a></li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <div class="dropdown ml-5">
                    <a href="#language">ENG</a>
                    <ul class="dropdown-box">
                        <li>
                            <a href="#USD">ENG</a>
                        </li>
                        <li>
                            <a href="#EUR">FRH</a>
                        </li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <span class="divider"></span>
                <a href="contact-us.html" class="contact d-lg-show"><i class="d-icon-map"></i>Contact</a>
                <a href="#" class="help d-lg-show"><i class="d-icon-info"></i> Need Help</a>
                <a class="login-link" href="ajax/login.html" data-toggle="login-modal"><i
                        class="d-icon-user"></i>Sign in</a>
                <span class="delimiter">/</span>
                <a class="register-link ml-0" href="ajax/login.html" data-toggle="login-modal">Register</a>
                <!-- End of Login -->
            </div>
        </div>
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="demo1.html" class="logo">
                    <img src={{asset('dentaire/images/demos/demo-medical/logo.png')}} alt="logo" width="154" height="43" />
                </a>
                <!-- End Logo -->

                <div class="header-search hs-simple">
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off"
                            placeholder="Search..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
                <!-- End Header Search -->
            </div>
            <div class="header-right">
                <a href="tel:#" class="icon-box icon-box-side">
                    <div class="icon-box-icon mr-0 mr-lg-2">
                        <i class="d-icon-phone"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title">Call Us Now:</h4>
                        <p>0(800) 123-456</p>
                    </div>
                </a>
                <span class="divider"></span>
                <a href="wishlist.html" class="wishlist">
                    <i class="d-icon-heart"></i>
                </a>
                <span class="divider"></span>
                <div class="dropdown cart-dropdown type2 mr-0 mr-lg-2">
                    <a href="#" class="cart-toggle label-block link">
                        <div class="cart-label d-lg-show">
                            <span class="cart-name">Shopping Cart:</span>
                            <span class="cart-price">$0.00</span>
                        </div>
                        <i class="d-icon-bag"><span class="cart-count">2</span></i>
                    </a>
                    <!-- End Cart Toggle -->
                    <div class="dropdown-box">
                        <div class="products scrollable">
                            <div class="product product-cart">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src={{asset("dentaire/images/cart/product-1.jpg")}} alt="product" width="80"
                                            height="88" />
                                    </a>
                                    <button class="btn btn-link btn-close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </figure>
                                <div class="product-detail">
                                    <a href="product.html" class="product-name">Product White Trends</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$21.00</span>
                                    </div>
                                </div>

                            </div>
                            <!-- End of Cart Product -->
                            <div class="product product-cart">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src={{asset("dentaire/images/cart/product-2.jpg")}} alt="product" width="80"
                                            height="88" />
                                    </a>
                                    <button class="btn btn-link btn-close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </figure>
                                <div class="product-detail">
                                    <a href="product.html" class="product-name">Dark Blue Women’s
                                        Leomora Hat</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$118.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Cart Product -->
                        </div>
                        <!-- End of Products  -->
                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span class="price">$139.00</span>
                        </div>
                        <!-- End of Cart Total -->
                        <div class="cart-action">
                            <a href="cart.html" class="btn btn-dark btn-link">View Cart</a>
                            <a href="checkout.html" class="btn btn-dark"><span>Go To Checkout</span></a>
                        </div>
                        <!-- End of Cart Action -->
                    </div>
                    <!-- End Dropdown Box -->
                </div>
                <div class="header-search hs-toggle mobile-search">
                    <a href="#" class="search-toggle">
                        <i class="d-icon-search"></i>
                    </a>
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off"
                            placeholder="Search your keyword..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
                <!-- End of Header Search -->
            </div>
        </div>

    </div>

    <div class="header-bottom d-lg-show">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav mr-4">
                    <ul class="menu menu-active-underline">
                        <li >
                            <a href="{{route('dentaire_store.index')}}">Home</a>
                        </li>
                        <li class="active">
                            <a href="{{route('dentaire_store.categories')}}">Categories</a>
                         
                        </li>
                        <li>
                            <a href="{{route('dentaire_store.products')}}">Products</a>
                           
                        </li>
                      
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="#"><i class="d-icon-card"></i>Special Offers</a>
                <a href="https://d-themes.com/buynow/Producthtml" target="_blank" class="ml-6">Buy Product!</a>
            </div>
        </div>
    </div>
</header> --}}
<!-- End Header -->


<header class="header header-border non-printable">
    <div class="header-top">
      {{--   <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome to Product store message or remove it!</p>
            </div>
            <div class="header-right">
                <div class="dropdown">
                    <a href="#currency">USD</a>
                    <ul class="dropdown-box">
                        <li><a href="#USD">USD</a></li>
                        <li><a href="#EUR">EUR</a></li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <div class="dropdown ml-5">
                    <a href="#language">ENG</a>
                    <ul class="dropdown-box">
                        <li>
                            <a href="#USD">ENG</a>
                        </li>
                        <li>
                            <a href="#EUR">FRH</a>
                        </li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <span class="divider"></span>
                <a href="contact-us.html" class="contact d-lg-show"><i class="d-icon-map"></i>Contact</a>
                <a href="#" class="help d-lg-show"><i class="d-icon-info"></i> Need Help</a>
                <a class="login-link" href="ajax/login.html" data-toggle="login-modal"><i
                        class="d-icon-user"></i>Sign in</a>
                <span class="delimiter">/</span>
                <a class="register-link ml-0" href="ajax/login.html" data-toggle="login-modal">Register</a>
                <!-- End of Login -->
            </div>
        </div> --}}
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="{{route('dentaire_store.index')}}" class="logo">
                    <img src="{{asset('logo_hb.jpg')}}" alt="logo" width="153" height="44" />
                </a>
                <!-- End Logo -->

                <div class="header-search hs-simple">
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off"
                            placeholder="Recherche..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
                <!-- End Header Search -->
            </div>
            <div class="header-right">
                <a href="tel:#" class="icon-box icon-box-side">
                    <div class="icon-box-icon mr-0 mr-lg-2">
                        <i class="d-icon-phone"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title">Appelez-nous maintenant:</h4>
                            @if ($settings->contains('name', 'phone'))
                                <p>{{$settings->where('name','phone')->first()->value?? '0(800) 123-456'}}</p>
                            @endif
                    </div>
                </a>
                <span class="divider"></span>
                <a href="javascript:;" class="wishlist">
                    <i class="d-icon-info" id="show-needhelp-popup"></i>
                </a>
                <span class="divider"></span>
                <div class="dropdown cart-dropdown type2 mr-0 mr-lg-2">
                    <a href="{{route('dentaire_store.cart')}}" class="cart-toggle label-block link">
                        <div class="cart-label d-lg-show">
                            <span class="cart-name">Panier:</span>
                            <span class="cart-price"><span class="cart-price-span">{{Cart::subtotal()}}</span> DA</span>
                        </div>
                        <i class="d-icon-bag"><span class="cart-count">{{Cart::count()}}</span></i>
                    </a>
                    <!-- End Cart Toggle -->
                    <div class="dropdown-box">
                        <div class="products scrollable" id="cart_space">
                            @foreach (Cart::content() as $item)

                                <div class="product product-cart item{{$item->id}}">
                                    <figure class="product-media">
                                        <a href="{{route('dentaire_store.products',$item->options->slug)}}">
                                          {{--   <div class="image_product_cart_s" style="background-image: url('{{asset($item->options->image)}}');">
                
                                            </div> --}}
                                            <img src="{{asset($item->options->image)}}" style="max-height:88px;max-width:80px" alt="product" width="80"
                                                height="88" />
                                        </a>
                                        <button class="btn btn-link btn-close" onclick="DeleteItem({{$item->id}})">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </figure>
                                    <div class="product-detail">
                                        <a href="{{route('dentaire_store.products',$item->options->slug)}}" class="product-name">{{$item->name}}</a>
                                        <div class="price-box">
                                            <span class="product-price">{{number_format($item->price, 2, '.', ',')}} DA <span style="color: gray">X {{$item->qty}}</span> </span>
                                             
                                            {{-- <span></span> --}}
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                
                                
                            @endforeach
                         
                            <!-- End of Cart Product -->
                        </div>
                        <!-- End of Products  -->
                        <div class="cart-total">
                            <label>Sous-total:</label>
                            <span class="price"><span class="cart-price-span">{{Cart::subtotal()}}</span> DA</span>
                        </div>
                        <!-- End of Cart Total -->
                        <div class="cart-action">
                            <a href="{{route('dentaire_store.cart')}}" class="btn btn-dark btn-link">Voir le panier</a>
                            <a href="{{route('dentaire_store.checkout')}}" class="btn btn-dark"><span>Aller à la caisse</span></a>
                        </div>
                        <!-- End of Cart Action -->
                    </div>
                    <!-- End Dropdown Box -->
                </div>
                <div class="header-search hs-toggle mobile-search">
                    <a href="#" class="search-toggle">
                        <i class="d-icon-search"></i>
                    </a>
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off"
                            placeholder="Search your keyword..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
                <!-- End of Header Search -->
            </div>
        </div>

    </div>

    <div class="header-bottom d-lg-show">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav mr-4">
                    <ul class="menu menu-active-underline">
                        <li class="@if (\Request::routeIs('dentaire_store.index')) active @endif  ">  
                            <a href="{{route('dentaire_store.index')}}">Accueil</a>
                        </li>
                        <li class="@if (\Request::routeIs('dentaire_store.categories')) active @endif">
                            <a href="{{route('dentaire_store.categories')}}">Catégories</a>
                         
                        </li>
                      {{--   <li class="@if (\Request::routeIs('dentaire_store.products')) active @endif">
                            <a href="{{route('dentaire_store.products')}}">Produits</a>
                           
                        </li> --}}
                      
                    </ul>
                </nav>
            </div>
            <div class="header-right">
              {{--   <a href="#"><i class="d-icon-card"></i>Special Offers</a>
                <a href="https://d-themes.com/buynow/Producthtml" target="_blank" class="ml-6">Buy Product!</a> --}}
            </div>
        </div>
    </div>
</header>