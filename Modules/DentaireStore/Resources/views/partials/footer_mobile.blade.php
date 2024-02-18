<!-- Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom non-printable">
    <a href="{{route('dentaire_store.index')}}" class="sticky-link active">
        <i class="d-icon-home"></i>
        <span>Accueil</span>
    </a>
    <a href="{{route('dentaire_store.categories')}}" class="sticky-link">
        <i class="d-icon-volume"></i>
        <span>Catégories</span>
    </a>
{{--     <a href="{{route('dentaire_store.products')}}" class="sticky-link">
        <i class="d-icon-user"></i>
        <span>Produits</span>
    </a> --}}
    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="d-icon-search"></i>
            <span>Recherche</span>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Recherchez votre mot-clé..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
    </div>
</div>
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top non-printable"><i class="d-icon-arrow-up"></i></a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper non-printable">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Recherchez votre mot-clé..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <ul class="mobile-menu mmenu-anim">
            <li>
                <a href="{{route('dentaire_store.index')}}">Home</a>
            </li>
            <li>
                <a href="{{route('dentaire_store.categories')}}">Categories</a>
           
            </li>
          {{--   <li>
                <a href="{{route('dentaire_store.products')}}">Products</a>
               
            </li> --}}
        
          
        </ul>
    </div>
</div>