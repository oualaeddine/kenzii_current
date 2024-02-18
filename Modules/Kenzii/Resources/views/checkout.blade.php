@extends('kenzii::layouts.master')

@section('content')

<section class="section mt-3 text-right" dir="rtl">
    <div class="container-fluid">
        <h2 class="fw-bold">{{$product->name}} - {{$color}}</h2>
        <h2 class="price text-danger fw-bold mb-0 mt-2">{{$price_info->price}} دج</h2>
        {{-- <h2 class="price text-danger fw-bold mb-0 mt-2">{{$price_info->price}} دج</h2> --}}
    </div>
</section>


<section class="section mt-5">
    <div class="container-fluid ">

        <div class="row justify-content-md-center">

            <div class="col-md-6">

                <form action="{{route('kenzii.checkout.store')}}" method="post">
                    @csrf
        
                    <input type="hidden" name="color" value="{{$color}}">
        
                    <div class="mb-3 col-md-12 text-center">
                        <label for="firstname" class="form-label">الاسم و اللقب <span class="text-danger"> * </span></label>
                        <input name="firstname" type="text" class="form-control form-control-lg" required id="firstname">
                    </div>
                    <div class="mb-3 col-md-12 text-center" >
                        <label for="phone" class="form-label">رقم الهاتف <span class="text-danger"> * </span></label>
                        <input name="phone" type="number" onKeyPress="if(this.value.length==10) return false;" class="form-control form-control-lg" required id="phone">
                    </div>
                    <div class="mb-3 col-md-12 text-center">
                        <label for="state" class="form-label">الولاية <span class="text-danger"> * </span></label>
                        <input name="state" type="text" class="form-control form-control-lg" required id="state">
                    </div>
                    <div class="mt-4 col-md-12 text-center" >
                        <button class="btn btn-lg fw-bold text-white btn-shaky"  style="width: 100%;background:#d87f93" type="submit">أطلب الأن</button>
                    </div>
                </form>

            </div>

         

        </div>
      
    </div>
</section>

    <script>
        fbq('track', 'AddToCart');
        fbq('track', 'InitiateCheckout');
    </script>
@endsection

