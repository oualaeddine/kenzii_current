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

    <div class="container mt-8 mb-8 col-md-7" dir="rtl" style="min-height: 65vh">

        @if (\Session::has('success'))

               <div class="alert alert-success">

                   {{\Session::get('success')}}
                     
               </div>

        @endif

        <div class="card shadow">
            <div class="card-body ">


                @if ($order != null)


                <div class="row justify-content-center" >

                    <div class="col-md-6 text-center" >
                      {{--   <div class="alert" style="background: #bd9bfd"> --}}
                            <h1 style="color:#FFD700;font-weight:bold">حالة طلبك الأن</h1>
                            <h2>{{$last_status}}</h2>
                   {{--      </div> --}}
                    </div>

                </div>
              


          {{--       <form action="{{route('barbarostools.contact.post')}}" method="post">
                    @csrf
 --}}
                    <div class="form-group mt-2">
                         
                          <hr>
                 
                    </div>


                    <div class="table-responsive">

                        <table class="table no-wrap">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">التاريخ</th>
                                <th scope="col">حالة الطلب</th>
                                <th scope="col" >الوصف</th>
                   
                              </tr>
                            </thead>
                            <tbody>
                                @if ($order->order_history->isEmpty())
                                    <td colspan="3" class="text-center">لا توجد معلومات بعد</td>
                                @else
    
                                    @foreach ($order->order_history->sortByDesc('created_at') as $order_history)
    
                                        <tr>
                                            <td width='100px'>{{$order_history->created_at->format('Y-m-d')}} <br> {{$order_history->created_at->format('H:i:s')}}</td>
                                            <td  width='120px'>{{$order_history->status}}</td>
                                            <td>{{$order_history->message}}</td>
                                        </tr>
                                        
                                    @endforeach
                                    
                                @endif
    
                            
                           
                            
                            </tbody>
                          </table>

                    </div>
                

                @else

                <div class="row justify-content-center ">

                    <div class="col-md-6 text-center ">
                       {{--  <div class="alert alert-warning"> --}}
                            <h2 class="text-danger ">نعتذر لم يتم العثور على طلب بهذا الرقم</h2>
                        {{-- </div> --}}
                    </div>

                </div>
                    
                @endif
                
             
                      
            
                    


               {{--  </form> --}}
            </div>
        </div>

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