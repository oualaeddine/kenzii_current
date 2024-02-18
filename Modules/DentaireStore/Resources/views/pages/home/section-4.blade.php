<section class="banner-section"
    style="background-image: url('images/demos/demo-medical/banner/bg.jpg'); background-color: #f8f8f8;">
    <div class="shape-divider">
        <div class="shape shape3">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 52.125 100 9.688" enable-background="new 0 52.125 100 9.688" xml:space="preserve">
                <path fill="#231F20"
                    d="M100,61.473c0,0-37.872-6.842-55.953-7.594C21.224,52.932,0,60.092,0,60.092V38.528h100V61.473z">
                </path>
            </svg>
        </div>
        <div class="shape shape4">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 56.375 100 8.625" enable-background="new 0 56.375 100 8.625" xml:space="preserve">
                <path fill="#ffffff" d="M0,60.203c0,0,22.964-3.885,33.646-3.59c10.682,0.293,19.515,0.594,32.812,3.227
                    C79.756,62.471,100,64.68,100,64.68V35.32H0V60.203z"></path>
            </svg>
        </div>
        <div class="shape shape5">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 38.617 100 8.499" enable-background="new 0 38.617 100 8.499" xml:space="preserve">
                <path fill="#fff" d="M100,43.26c0,0-22.965,3.885-33.646,3.591s-19.515-0.595-32.812-3.227C20.245,40.993,0,38.784,0,38.784
        v22.433h100V43.26z"></path>
            </svg>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="banner-content">
                    <span class="banner-info text-uppercase">
                        <span>

                            @if ($trend->contains('name','trend_title'))
                                   {{$trend->where('name','trend_title')->first()->value}}
                            @else
                                    Best Seller {{-- {{$settings->trend_title}} --}}
                            @endif
                           
                        </span>
                    </span>
                    <h3 class="banner-title font-weight-bold mb-5">
                        
                        @if ($trend->contains('name','trend_second_title'))
                            {{$trend->where('name','trend_second_title')->first()->value}}
                        @else
                            Trend Of Nowadays Medical Mask{{-- {{$settings->trend_second_title}} --}}
                        @endif
                      
                    </h3>
                    <p class="mb-8">
                        
                        @if ($trend->contains('name','trend_text'))
                            {{$trend->where('name','trend_text')->first()->value}}
                        @else
                            Lorem ipsum dolor sit amet, consectetur adipisicing dolore magna
                            aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation.{{-- {{$settings->trend_text}} --}}
                        @endif
                 
                    
                    </p>
                    @if ($trend->contains('name','product'))
                        <a href="{{route('dentaire_store.products',$trend->where('name','product')->first()->value)}}" class="btn btn-rounded btn-primary mb-4">Achetez maintenant</a>
                     
                    @else
                        <a href="#" class="btn btn-rounded btn-primary mb-4">Achetez maintenant</a>
                    @endif
                   
                </div>
            </div>
            <div class="col-lg-8">
                <figure class="banner-image1">
                    @if ($trend->contains('name','trend_img_1'))
                        <img src={{ asset($trend->where('name','trend_img_1')->first()->value) }} alt="banner" width="501"
                        height="500">
                    
                    @else
                        <img src={{ asset('dentaire/images/demos/demo-medical/banner/1.jpg') }} alt="banner" width="501"
                        height="500">
                    @endif
         
                   
                </figure>
                <figure class="banner-image2 y-50">
                    @if ($trend->contains('name','trend_img_2'))
                        <img src={{ asset($trend->where('name','trend_img_2')->first()->value) }} alt="banner" width="380"
                        height="381">
                
                    @else   
                        <img src={{ asset('dentaire/images/demos/demo-medical/banner/2.jpg') }} alt="banner" width="380"
                        height="381">
                    @endif

                </figure>
            </div>
        </div>
    </div>
</section>
