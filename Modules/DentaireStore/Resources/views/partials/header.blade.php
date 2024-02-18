<!-- Header -->
<header class="header">
    <div class="header-top">
        <div class="container">
            {{-- <div class="header-left">
                <div class="welcome-msg">
                    <a href="contact-us.html" class="contact"><i class="d-icon-map mr-1"></i>Find
                        Riode
                        Store</a>
                    <a href="#" class="help"><i class="d-icon-info mr-1"></i>Free Standard Shipping</a>
                </div>
            </div> --}}
            <div class="header-right">
                <a class="call" href="tel:#">
                    <i class="d-icon-phone"></i>
                    <span>Appelez-nous : </span>0(800) 123-456 {{-- {{$settings->phone}} --}}
                </a>
                <a href="wishlist.html" class="wishlist"><i class="d-icon-info mr-1"></i><span>Besoin d'aide ?</span></a>
                <div class="dropdown cart-dropdown cart-offcanvas type3">
                    <a href="#" class="cart-toggle">
                        <i class="d-icon-bag"></i>
                        Mon panier
                    </a>
                    <div class="cart-overlay"></div>
                    <!-- End Cart Toggle -->
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <h4 class="cart-title">Shopping Cart</h4>
                            <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                    class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                        </div>
                        <div class="products scrollable">
                            <div class="product product-cart">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src={{asset('dentaire/images/cart/product-1.jpg')}} alt="product" width="80"
                                            height="88" />
                                    </a>
                                    <button class="btn btn-link btn-close">
                                        <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                    </button>
                                </figure>
                                <div class="product-detail">
                                    <a href="product.html" class="product-name">Riode White Trends</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$21.00</span>
                                    </div>
                                </div>

                            </div>
                            <!-- End of Cart Product -->
                            <div class="product product-cart">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src={{asset('dentaire/images/cart/product-2.jpg')}} alt="product" width="80"
                                            height="88" />
                                    </a>
                                    <button class="btn btn-link btn-close">
                                        <i class="fas fa-times"></i><span class="sr-only">Close</span>
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
            </div>
        </div>
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle mr-0">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="{{route('dentaire_store.index')}}" class="logo d-none d-lg-block">
                    <img src={{asset('dentaire/images/demos/demo-medical/logo.png')}} alt="logo" width="154" height="43" />
                </a>
                <!-- End Logo -->
            </div>
            <div class="header-center d-flex justify-content-center">
                <a href="{{route('dentaire_store.index')}}" class="logo d-block d-lg-none">
                    <img src={{asset('dentaire/images/demos/demo-medical/logo.png')}} alt="logo" width="154" height="43" />
                </a>
                <!-- End Logo -->
            </div>
            <div class="header-right">
                <nav class="main-nav mr-4">
                    <ul class="menu menu-active-underline">
                        <li class="active">
                            <a href="{{route('dentaire_store.index')}}">Accueil</a>
                        </li>
                        <li>
                            <a href="{{route('dentaire_store.categories')}}">Catégories</a>
                         
                        </li>
                        <li>
                            <a href="{{route('dentaire_store.products')}}">Produits</a>
                           
                        </li>
                      
                    </ul>
                </nav>

                <span class="divider mr-4"></span>
                <div class="header-search hs-toggle d-block">
                    <a href="#" class="search-toggle d-flex align-items-center">
                        <i class="d-icon-search"></i>
                    </a>
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off"
                            placeholder="Cherchez votre mot-clé..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- End Header -->