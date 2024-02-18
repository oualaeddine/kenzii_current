<section class="intro-section">
    <div class="owl-carousel owl-theme row owl-nav-fade intro-slider animation-slider cols-1 gutter-no"
        data-owl-options="{
        'nav': true,
        'dots': false,
        'loop': false,
        'items': 1,
        'autoplay': false,
        'autoplayTimeout': 8000
    }">

        @foreach ($slider as $item)

                <div class="intro-slide1 banner banner-fixed" style="background-color: #f6f6f6;">
                    <figure>
                        @if ($item->contains('name','slider_img'))

                            <img src={{asset($item->where('name','slider_img')->first()->value??'product_holder.png')}} alt="intro-banner" width="1903"
                            height="741" style="background-color: #f6f6f6;" />

                        @else

                            <img src={{asset('dentaire/images/demos/demo-medical/slides/1.jpg')}} alt="intro-banner" width="1903"
                            height="741" style="background-color: #f6f6f6;" />

                        @endif
                      
                    </figure>
                    <div class="container">
                        <div class="banner-content pb-1">
                            <h2 class="banner-title mb-3 ls-m slide-animate"
                                data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                <strong class="text-uppercase">
                                @if ($item->contains('name','special_title'))
                                    {{$item->where('name','special_title')->first()->value??'empty'}}
                                @else
                                        Special title here 
                                @endif 
                                </strong> 
                                @if ($item->contains('name','main_title'))
                                    {{$item->where('name','main_title')->first()->value??'empty'}}
                                @else
                                        Main title here 
                                @endif 
                                </h2>
                            <h4 class="banner-subtitle text-uppercase mb-2 slide-animate"
                                data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                @if ($item->contains('name','second_title'))
                                 <strong> {{$item->where('name','second_title')->first()->value??'empty'}}</strong>
                                @else
                                    Up to <strong>50% off</strong>
                                @endif
                                {{-- {{$item->second_title}} --}}
                            </h4>
                            <p class="slide-animate"
                                data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                @if ($item->contains('name','main_text'))
                                    {{$item->where('name','main_text')->first()->value??'empty'}}
                                @else
                                     Free Shipping on all Products over {{-- {{$item->main_text}} --}} 
                                @endif
                                <span class="text-secondary font-weight-bold">
                                    @if ($item->contains('name','second_text'))
                                            {{$item->where('name','second_text')->first()->value??'empty'}}
                                    @else
                                             $99.00
                                    @endif
                                   {{-- {{$item->second_text}} --}}
                                </span> 
                            </p> 
                            <a href="@if ($item->contains('name','product')) {{route('dentaire_store.products',$item->where('name','product')->first()->value??'1')}} @else # @endif" class="btn btn-primary btn-rounded slide-animate"
                                data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Acheter maintenant<i class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
        </div>
            
        @endforeach
      
    {{--     <div class="intro-slide2 banner banner-fixed " style="background-color: #f6f6f6;">
            <figure>
                <img src={{asset('dentaire/images/demos/demo-medical/slides/2.jpg')}} alt="intro-banner" width="1903"
                    height="741" style="background-color: #f6f6f6;" />
            </figure>
            <div class="container">
                <div class="banner-content pb-1">
                    <h4 class="banner-subtitle mb-3 text-uppercase slide-animate"
                        data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                        Get up to <strong>30% off</strong>
                    </h4>
                    <h2 class="banner-title mb-3 slide-animate"
                        data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                        Roentgenometer
                    </h2>
                    <p class="slide-animate"
                        data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                        Lorem ipsum dolor sit amet, consectetur adipiscing <br>
                        ididunt ut labore et dolore magna aliqua.</p>
                    <a href="shop.html" class="btn btn-rounded btn-primary slide-animate"
                        data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Shop
                        Now<i class="d-icon-arrow-right"></i></a>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="shape-divider">
        <div class="shape shape1">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="-3.188 9.063 100 10.875" enable-background="new -3.188 9.063 100 10.875"
                xml:space="preserve">
                <path fill="#231F20" d="M-3.188,11.513c0,0,29.888,2.44,42.861,6.364c12.973,3.922,35.721,0.281,43.613-2.004
                    c7.188-2.082,13.525-6.801,13.525-6.801v21.805l-100,0.676V11.513z"></path>
            </svg>
        </div>
        <div class="shape shape2">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 7.938"
                enable-background="new 0 0 100 7.938" xml:space="preserve">
                <path fill="#ffffff" d="M100,29.986H0V1.836c0,0,5.66-0.597,22.239,1.458c10.008,1.24,26.036,4.428,43.959,4.428
                    C87.355,7.722,100,0.013,100,0.013V29.986z"></path>
            </svg>
        </div>
    </div>
</section>