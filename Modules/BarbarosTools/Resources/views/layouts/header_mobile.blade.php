
<!-- Sticky Footer -->


{{-- <div class="sticky-footer-spec buy-me hide-on-desktop" >

    <a href="{{route('barbarostools')}}" class="sticky-link active">
        <i class="d-icon-home"></i>
        <span>الرئيسية</span>
    </a> --}}
   {{--  <a href="#" class="sticky-link active">
        <i class="d-icon-laptop"></i>
        <span>الأحكام والشروط</span>
    </a> --}}
  {{--   <a href="#" class="sticky-link active">
        <i class="d-icon-secure"></i>
        <span>سياسية الخصوصية</span>
    </a> --}}
   {{--  <a href="shop-grid-3cols.html" class="sticky-link">
        <i class="d-icon-volume"></i>
        <span>التنيصفات</span>
    </a>
 --}}
{{--     <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="d-icon-search"></i>
            <span>Search</span>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
    </div>
</div> --}}

@if (\Request::route()->getName() === 'barbarostools.product' || \Request::route()->getName() === 'barbarostools.product.details')
<div class="buttom-bar">
@else
<div class="buttom-bar-all" >
@endif




<div class="sticky-footer sticky-content" style="position: fixed;
left: 0;
right: 0;
opacity: 1;
transform: translateY(0);
background: #fff;
z-index: 1051;
box-shadow: 0 0 10px 1px rgb(0 0 0 / 10%);
bottom: 0;
">

    <a href="/" class="sticky-link @if (\Request::route()->getName() === 'barbarostools' || URL::current() === url('/') ) active-footer-mobile @endif text-deco">
        <i class="d-icon-home"></i>
        <span>الرئيسية</span>
    </a>
    <a href="{{route('barbarostools.shop')}}"  class="sticky-link @if (\Request::route()->getName() === 'barbarostools.shop' ) active-footer-mobile @endif text-deco">
        <i class="d-icon-volume"></i>
        <span>المتجر</span>
    </a>
    <a href="{{route('barbarostools.contact')}}" class="sticky-link @if (\Request::route()->getName() === 'barbarostools.contact') active-footer-mobile @endif text-deco">
        <i class="d-icon-user"></i>
        <span>مساعدة</span>
    </a>
    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link text-deco">
            <i class="d-icon-search"></i>
            <span>بحث</span>
        </a>

        @if (\Request::route()->getName() === 'barbarostools.shop')

            <form action="{{route('barbarostools.shop')}}" class="input-wrapper" >
                <input type="text" dir="rtl" class="form-control" name="search" autocomplete="off"
                    placeholder="اكتب إسم المنتج الذي تبحث عنه ..." required id="search"  value="{{$search}}"/>
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
            
        @else

            <form action="{{route('barbarostools')}}" class="input-wrapper" >
                <input type="text" dir="rtl" class="form-control" name="search" autocomplete="off"
                    placeholder="اكتب إسم المنتج الذي تبحث عنه ..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
            
        @endif
     
    </div>
</div>



@if (\Request::route()->getName() === 'barbarostools.product' || \Request::route()->getName() === 'barbarostools.product.details')


        <div style="position: fixed;
        left: 0;
        bottom: 70px;
        width: 100%;
        z-index:99;display:none" class="hide-on-desktop buy-me"  dir="rtl">

            {{-- <div class="product-form product-qty">
                <div class="product-form-group" > --}}

                    <a href="{{ route('barbarostools.checkout',$store_product->id ) }}" style="display: inline-block;width: 100%;
                    text-align: center;
                    vertical-align: middle;
                    border: 1px solid transparent;
                    border-radius: .25rem;" class="btn-product btn-cart-special text-normal ls-normal font-weight-semi-bold" type="submit">
                        أطلب الأن
                        <i class="d-icon-bag"></i>
                    </a>
                    
                
            {{--     </div>
            </div> --}}

            
        </div>

    
            
@endif


</div>
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

