<section class="section mt-3">
    <div class="container-fluid">
        <h2 class="fw-bold">{{$product->name}}</h2>
        <h2 class="price text-danger fw-bold mb-0 mt-2">{{$price_info->price}} دج  
        @if ($price_info->price_old != 0 && $price_info->price_old != null)
            <span style="color:#807f7f;font-size: 36px;text-decoration: line-through;" >{{$price_info->price_old}} <span> دج </span></span>
        @endif
        </h2>

       
    </div>
</section>