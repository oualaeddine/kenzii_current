@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')


@section('content')

    @if(Session::has('error'))

        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error</h4>
            <div class="alert-body">
                {{ Session::get('error') }}
            </div>
        </div>
    @endif

    @if(Session::has('success'))

        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success</h4>
            <div class="alert-body">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif


    <!-- Kick start -->
    {{-- <div class="card"> --}}
       
        <div class="card-body">

          <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="card">
                <div class="card-header">
                  <div>
                    <h4 class="font-weight-bolder mb-0">{{number_format($total['caisse'], 2, ',', ' ')  }} DA</h4>
                    <p class="card-text">Caisse</p>
                  </div>
                  <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                      <i class="fas fa-money-check-alt fa-lg"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="card">
                <div class="card-header">
                  <div>
                    <h4 class="font-weight-bolder mb-0">{{number_format($total['caisse_euro'], 2, ',', ' ')   }} £</h4>
                    <p class="card-text">Caisse Euro</p>
                  </div>
                  <div class="avatar bg-light-success p-50 m-0">
                    <div class="avatar-content">
                      <i class="fas fa-euro-sign fa-lg"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="card">
                <div class="card-header">
                  <div>
                    <h4 class="font-weight-bolder mb-0">{{$total['count_liv'] }}</h4>
                    <p class="card-text">Count livré</p>
                  </div>
                  <div class="avatar bg-light-danger p-50 m-0">
                    <div class="avatar-content">
                      <i class="fas fa-truck fa-lg"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="card">
                <div class="card-header">
                  <div>
                    <h4 class="font-weight-bolder mb-0">{{$total['count_rtr'] }}</h4>
                    <p class="card-text">Count Retourné</p>
                  </div>
                  <div class="avatar bg-light-warning p-50 m-0">
                    <div class="avatar-content">
                      <i class="fas fa-undo-alt fa-lg"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

              @include('statistics::section_2')
              @include('statistics::section_3')
              @include('statistics::section_4')
            
        </div>
    {{-- </div> --}}
    <!--/ Kick start -->




    @push('js')
        
    @endpush
@endsection
