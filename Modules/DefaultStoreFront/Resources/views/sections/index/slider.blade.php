<section class="pt-70 ">
    <div class="container">
      <div class="row justify-content-center">
{{--         <div class="col-lg-7">
          <div class="row"> --}}
            <div class="col-lg-4 col-md-4 ">
       {{--  <div class="col-lg-5 col-md-5 mb-xs-30"> --}}
                
                   <div class="row justify-content-center">

                        <div class="col-lg-9 col-md-9">

                            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native">
                                @foreach ($product_photos as $item)
                                <a href="#" target="_blank"><img src="{{  asset($item->link)}}" class="d-block w-100" alt="Stylexpo"></a> 
                                @endforeach
                            </div>

                        </div>

                   </div>
                  
                    

                  <section class="basic-info section">
                    {{-- <div class="container-fluid"> --}}
                        <div class="row">
                            <div class="col-12">
                                <h5 class="fw-bold">{{$product->name}}</h5>
                            </div>
                            <div class="col-6 text-start">
                                <h2 class="price text-danger fw-bold mb-0 mt-2">{{number_format($price_info->price, 2, ',', '.')  }} دج</h2>
                                <p class="price-text text-muted lead fw-bold">{{$price_info->price_txt}}</p>
                            </div>
                            <div class="col-6 text-end old-price-section gray-color">
                                <h3 class="price fw-bold mb-0 mt-2">{{number_format($price_info->price_old, 2, ',', '.')  }} دج</h3>
                            <!--<p class="price-text lead fw-bold">السعر قبل التخفيضات</p>-->
                            </div>
                        </div>
                    {{-- </div> --}}
                </section>
                  
            </div>
           {{--  </div>
        </div> --}}
    </div>

</section>
