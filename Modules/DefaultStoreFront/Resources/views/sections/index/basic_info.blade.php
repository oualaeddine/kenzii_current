<section class="basic-info section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h5 class="fw-bold">{{$product->name}}</h5>
            </div>
            <div class="col-6 text-start">
                <h2 class="price text-danger fw-bold mb-0 mt-2">{{$price_info->price}} دج</h2>
                <p class="price-text text-muted lead fw-bold">{{$price_info->price_txt}}</p>
            </div>
            <div class="col-6 text-end old-price-section gray-color">
                <h3 class="price fw-bold mb-0 mt-2">{{$price_info->price_old}} دج</h3>
<!--                <p class="price-text lead fw-bold">السعر قبل التخفيضات</p>-->
            </div>
        </div>
    </div>
</section>