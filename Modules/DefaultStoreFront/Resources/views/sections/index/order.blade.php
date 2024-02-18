<section class="float-order-btn">
    <div class="container-fluid">
        <div class="d-grid gap-2">
            <form action="{{route('product.checkout')}}" method="GET">
                {{-- @csrf --}}

                <input type="hidden" name="store_product" value="{{$price_info->id}}">

               {{--  <input type="hidden" name="store_id" value="{{$price_info->store_id}}"> --}}

                <button class="btn btn-lg fw-bold text-white btn-shaky"  style="width: 100%;background:#3a86ff" type="submit">أطلب الأن</button>
            </form>
            
        </div>
    </div>
</section>