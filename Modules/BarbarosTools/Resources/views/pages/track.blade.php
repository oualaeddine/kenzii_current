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

    <div class="container mt-10 col-md-6" dir="rtl" style="min-height: 65vh">

        @if (\Session::has('success'))

               <div class="alert alert-success">

                   {{\Session::get('success')}}
                     
               </div>

        @endif

        <div class="card shadow">
            <div class="card-body">

                <h2 class="text-center mt-4 mb-4">تتبع طلبك</h2>

                <form action="{{route('barbarostools.track.show')}}" id="addnewcadidateform" method="get">
                   

                    <div class="form-group mt-8">
                          <label for="order" class="mb-2" > أدخل رقم طلبك <span class="text-danger"> * </span></label>
                          <input type="order" oninvalid="this.setCustomValidity('الرجاء إدخال رقم الطلب')" oninput="setCustomValidity('')"  placeholder="رقم طلبك الموجود في الرسالة القصيرة ..." required name="order" id="order" class="form-control">
                    </div>




                    <div class="mt-4 text-center">
                        <button class="btn btn-order" style="color: white"  type="submit">تتبع طلبك</button>
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

   {{--  <script>
        $('#order').on('input',function(){

            $('#message').text('');

        });

        $('#btn-track').on('click',function(){
            
            var order = $('#order').val();

            $.ajax({
                    url: "{{route('barbarostools.track.get')}}",
                    type: 'get', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    data: {
                        order: order,
                    },

                    error: function (error) {

                    },
                    success: function (data) {
                        $('#message').text(data.message);
                    }
            });






        })

    </script> --}}
        
    @endpush
@endsection