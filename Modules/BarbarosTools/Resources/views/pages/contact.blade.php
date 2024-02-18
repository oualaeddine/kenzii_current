@extends('barbarostools::layouts.master')

@section('content')

@push('css')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


<style>

    * {
        font-size: 16px;
    }

    a {
        color:#444 !important;
    }

    a:hover{
        color:#FFD700 !important;
    }
    
    .btn{
        font-size: 16px;
    }

    input,textarea {
        font-size: 14px !important;
    }
</style>
    
@endpush


    @include('barbarostools::layouts.header')
    <!-- End of Header -->

    <div class="container mt-8 col-md-6" style="min-height: 65vh" dir="rtl">

        @if (\Session::has('success'))

               <div class="alert alert-success">

                   {{\Session::get('success')}}
                     
               </div>

        @endif

        <div class="card shadow">
            <div class="card-body">

                <h2 class="text-center mt-4 mb-4">تواصل معنا</h2>

                <form action="{{route('barbarostools.contact.post')}}" method="post">
                    @csrf

                    <div class="form-group mt-2">
                          <label for="email" class="mb-2" > البريد الإلكتروني <span class="text-danger"> * </span></label>
                          <input type="email" oninvalid="this.setCustomValidity('الرجاء إدخال البريد الإلكتروني')" oninput="setCustomValidity('')"  required   placeholder="بريدك الإلكتروني ..." name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group mt-2">
                        <label for="message" class="mb-2"> رسالتك <span class="text-danger"> * </span></label>
                        <textarea name="message" oninvalid="this.setCustomValidity('الرجاء إدخال الرسالة') " oninput="setCustomValidity('')"  required   id="message" cols="30" class="form-control" rows="5" placeholder="رسالتك ..."></textarea>
                    </div>


                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-order" style="color: white" > إرسال</button>
                    </div>
                </form>
            </div>
        </div>

        <section class="section mt-3 text-right" dir="rtl">
            <div class="container">
              
                {{-- <h2 class="price text-danger fw-bold mb-0 mt-2">{{$price_info->price}} دج</h2> --}}
            </div>
        </section>

    
       
    </div>



{{--     <script>
        fbq('track', 'Purchase');
    </script> --}}


    <!-- End of Main -->

    @include('barbarostools::layouts.footer')
    
    <!-- End of Footer -->
</div>

    @include('barbarostools::layouts.header_mobile')

    @push('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" 
    integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        
    @endpush
@endsection