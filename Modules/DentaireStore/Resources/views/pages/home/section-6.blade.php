<section class="category-section bg-primary">
    <div class="shape-divider">
        <div class="shape shape6">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 58.416 100 2.377"
                enable-background="new 0 58.416 100 2.377" xml:space="preserve">
                <path fill="#fff"
                    d="M0,58.529c0,0,24.974,2.082,49.96,2.082c25.013,0,50.04-2.082,50.04-2.082V39.388H0V58.529z">
                </path>
            </svg>
        </div>
        <div class="shape shape7">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 39.281 100 2.406"
                enable-background="new 0 39.281 100 2.406" xml:space="preserve">
                <path fill="#fafafa"
                    d="M100,41.471c0,0-24.975-2.083-49.96-2.083C25.026,39.388,0,41.471,0,41.471v19.14h100V41.471z">
                </path>
            </svg>
        </div>
    </div>
    <div class="title-wrapper title-white">
        <div class="container">
            <h2 class="title">Parcourir nos catégories</h2>
            <span class="title-info">Départements</span>
        </div>
    </div>
    <div class="container text-center">
        <div class="owl-carousel owl-theme owl-nav-fade row cols-lg-4 cols-md-3 cols-2 mb-6"
            data-owl-options="{
            'items': 4,
            'nav': false,
            'dots': false,
            'margin': 20,
            'loop': false,
            'responsive': {
                '0': {
                    'items': 2
                },
                '768': {
                    'items': 3
                },
                '992': {
                    'items': 4,
                    'nav': true
                }
            }
        }">


        @foreach ($categories as $item)

            <div class="category category-classic">
                <figure class="category-media">
                    <a href="demo-medical-shop.html">
                        <img src={{asset('dentaire/images/demos/demo-medical/category/1.jpg')}} alt="category" width="280"
                            height="175">
                    </a>
                </figure>
                <div class="category-content">
                    <h4 class="category-name">{{$item->category->name}}</h4>
                    <span class="category-count">{{$item->store_product_count}} Produits</span>
                </div>
            </div>

        @endforeach
      
        </div>
        <a href="demo-medical-shop.html" class="btn btn-rounded btn-dark">Voir toutes les catégories</a>
    </div>
</section>