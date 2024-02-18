@extends('barbarostools::layouts.master')

@section('content')

@push('css')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />


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

    <div class="container mb-8" style="min-height: 65vh">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10 col-sm-12 text-purple text-right" dir="rtl">
            <h1 style="margin-top:50px;">الأسئلة الأكثر شيوعا</h1>
            <br>
            <div class="accordion" id="accordionExample">
              
             {{--  <div class="card border-0 mb-1">
                <div class="card-header"  style="background-color:#f5eaec" id="headingone">
                  <div class="row">
                    <div class="col-sm-10">
                  <h6 class="mb-0" ><span class=""> كيف يعمل جهاز Kenzii ؟</span></h6>
                   </div>
                 <div class="col-sm-2">
                  <button class="btn"  type="button" data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                    ↓
                  </button>
                   </div>
                 </div>
                </div>
                <div id="collapseone" class="collapse" aria-labelledby="headingone" data-parent="#accordionExample">
                  <div class="card-body">
                    <p><span style="font-weight: 400;">يعتمد جهاز Kenzii على
                        تقنية ال IPL ( وميض ضوئي مكثف) , وهي تقنية حديثة
                    </span><span style="font-weight: 400;">&nbsp;لإزالة
                        الشعر بشكل دائم و بدون ألم أو مخاطر. عندما تستعملين
                        الجهاز على الشعر يقوم بامتصاص الوميض بحيث بعد ذلك
                        يقوم بتدمير خلايا الشعر المستهدف .</span></p>
                  </div>
                </div>
              </div> --}}
    
    
             
    
            
              
         
        </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
    @endpush

@endsection