<section class="section mt-5">
    <div class="container-fluid">
        <form action="{{route('product.checkout.store')}}" method="POST" id="checkout_form" enctype="multipart/form-data">
            @method('POST')
            @csrf

            {{-- <input type="hidden" name="product_id" value="{{$product->id}}"> --}}
            <input type="hidden" name="store_product" value="{{$price_info->id}}">

            <div class="mb-3">
                <label for="firstname" class="form-label">الاسم و اللقب <span class="text-danger"> * </span></label>
                <input name="firstname" type="text" class="form-control form-control-lg" required id="firstname">
            </div>
            <div class="mb-3 text-right" dir="rtl">
                <label for="phone" class="form-label">رقم الهاتف <span class="text-danger"> * </span></label>
                <input name="phone" type="tel" class="form-control form-control-lg" required id="phone">
                <span class="text-danger" style="display: none" id="phone_val"> يجب على رقم الهاتف ان يكون مكون من 10 أرقام أو اكثر</span>
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">الولاية <span class="text-danger"> * </span></label>
                <input name="state" type="text" class="form-control form-control-lg" required id="state">
            </div>
            <div class="mt-4">
                <button class="btn btn-lg fw-bold text-white btn-shaky" style="width: 100%;background:#3a86ff" type="submit" id="checkout-submit-btn" >أطلب الأن</button>
            </div>
        </form>
    </div>
    
</section>