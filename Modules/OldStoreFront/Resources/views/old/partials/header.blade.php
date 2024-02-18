<!-- Header -->
<div class="lx-header">
    <!-- Header Bottom -->
    <div class="lx-header-bottom">
        <div class="lx-header-bottom-content">
            <div class="lx-header-logo">
                <a href=""><img src="{{asset('favicon.ico')}}" alt=""></a>
            </div>
            <div class="lx-mobile-menu">
                <a href="javascript:"><i class="fa fa-bars"></i></a>
            </div>
            <div class="lx-main-menu">
                  <ul>
                     @foreach($categories as $category)
                         <li><a href="{{route('store.category',$category->id)}}" class="">{{$category->title}}</a>
                         </li>
                     @endforeach
                     <li><a href="{{route('store.discounts')}}" class="">تخفيضات</a></li>
                 </ul>
                <div class="lx-clear-fix"></div>
            </div>
                      <div class="lx-header-cart">
                <a href="#>">
                    <i class="fa fa-shopping-basket"></i>
                </a>
            </div>
            <div class="lx-clear-fix"></div>
        </div>
    </div>
    <div class="lx-clear-fix"></div>
</div>
