@extends('dentairestore::layouts.master')

@push('css')

<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/magnific-popup/magnific-popup.min.css')}}>

<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/nouislider/nouislider.min.css')}}>
<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/photoswipe/photoswipe.min.css')}}>
<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/photoswipe/default-skin/default-skin.min.css')}}>
    
<link rel="stylesheet" href="{{asset("store/css/general_style.css")}}">
<!-- Main Style of the template -->
<link rel="stylesheet" href="{{asset('store/css/main_style.css')}}">


@endpush


@section('content')


    <main class="main mt-8 single-product">
        <div class="page-content mb-10 pb-6">
            <div class="container">

                 @include('dentairestore::pages.products.modal_images')
               
                 @include('dentairestore::pages.products.section-1')
                 
                 @include('dentairestore::pages.products.section-2')

                 @include('dentairestore::pages.products.section-3')
               
            </div>
        </div>
    </main>


    @push('js')

    <script src="{{asset('/store/js/popup.js')}}" type="text/javascript"></script>
    <script src="{{asset('/store/js/script.js')}}" type="text/javascript"></script>
  
    @endpush

@endsection
