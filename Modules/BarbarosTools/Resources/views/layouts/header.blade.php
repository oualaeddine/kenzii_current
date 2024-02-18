<header class="header" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;" dir="rtl">
    <div class="header-middle sticky-header fix-top sticky-content has-center" style="padding-top:0; padding-bottom:0;">
        <div class="container">
            <div class="header-left">
            
                <nav class="main-nav">
                    <ul class="menu menu-active-underline">
                        <li class=" @if (\Request::route()->getName() === 'barbarostools' || URL::current() === url('/') ) active @endif">
                            <a href="/" class="nav-link" style="font-size: 18px">الرئيسية</a>

                        </li>

                        <li  class=" @if (\Request::route()->getName() === 'barbarostools.shop') active @endif" >
                            <a href="{{route('barbarostools.shop')}}" class="nav-link" style="font-size: 18px">المتجر</a>

                        </li>

                        <li >
                            <a href="{{route('barbarostools.terms')}}" class="nav-link" style="font-size: 18px;">الأحكام والشروط</a>

                        </li>

                        <li >
                            <a href="{{route('barbarostools.privacy')}}" class="nav-link mr-4" style="font-size: 18px">سياسة الخصوصية</a>

                        </li>

                        


                        <!-- End of Dropdown -->
               {{--          <li >
                            <a href="#" class="nav-link" >Catégories</a>
                            <ul>
                                <li> <a class="nav-link" href="element-products.html">Products</a></li>
                                <li> <a class="nav-link" href="element-typography.html">Typography</a></li>
                                <li> <a class="nav-link" href="element-titles.html">Titles</a></li>
                                <li> <a class="nav-link" href="element-categories.html">Product Category</a></li>
                                <li> <a class="nav-link" href="element-buttons.html">Buttons</a></li>
                                <li> <a class="nav-link" href="element-accordions.html">Accordions</a></li>
                                <li> <a class="nav-link" href="element-alerts.html">Alert &amp; Notification</a></li>
                                <li> <a class="nav-link" href="element-tabs.html">Tabs</a></li>
                                <li> <a class="nav-link" href="element-testimonials.html">Testimonials</a></li>
                                <li> <a class="nav-link" href="element-blog-posts.html">Blog Posts</a></li>
                                <li> <a class="nav-link" href="element-instagrams.html">Instagrams</a></li>
                                <li> <a class="nav-link" href="element-cta.html">Call to Action</a></li>
                                <li> <a class="nav-link" href="element-icon-boxes.html">Icon Boxes</a></li>
                                <li> <a class="nav-link" href="element-icons.html">Icons</a></li>
                            </ul>
                        </li> --}}
                        <!-- End of Dropdown -->
                   
                      
                   {{--      <li>
                            <a href="about-us.html" class="nav-link">Boutique</a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
            <div class="header-center">
             
                <!-- End of Logo -->

            </div>
            <div class="header-right">

                
                <a href="/" class="logo">
                    <img src="{{asset('logo_header.png')}}" alt="logo" width="153" height="44"  />
                </a>

{{-- 
                <nav class="main-nav">
                    <ul class="menu menu-active-underline">
                    
                      
                        <li>
                            <a href="about-us.html" class="nav-link">Cat 1</a>
                        </li>

                        <li>
                            <a href="about-us.html" class="nav-link">Cat 2</a>
                        </li>

                        <li>
                            <a href="about-us.html" class="nav-link">Cat 3</a>
                        </li>

                        <li>
                            <a href="about-us.html" class="nav-link">Cat 4</a>
                        </li>

                        
                    </ul>
                </nav> --}}
                
            </div>
        </div>

    </div>
</header>