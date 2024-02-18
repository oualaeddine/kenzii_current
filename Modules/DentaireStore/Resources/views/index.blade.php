@extends('dentairestore::layouts.master')

@section('content')


    <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>

    <main class="main home">
        <div class="page-content">

            @include('dentairestore::pages.home.section-intro')

            @include('dentairestore::pages.home.section-2')

            @include('dentairestore::pages.home.section-3')

            @include('dentairestore::pages.home.section-4')

            @include('dentairestore::pages.home.section-5')

            @include('dentairestore::pages.home.section-6')

            @include('dentairestore::pages.home.section-7')

        {{--     @include('dentairestore::pages.home.section-8') --}}

            @include('dentairestore::pages.home.section-9')


        </div>
    </main>

    <!-- End of Main -->


    @push('js')

        <script>
              $(window).on('load', function(){

                $('.lazyload').each(function() {

                

                var lazy = $(this);
                var src = lazy.attr('data-src');

                        $('<img>').attr('src', src).on('load',function(){
                            lazy.find('img.spinner').remove();
                            lazy.css('background-image', 'url("'+src+'")');
                        });
                        
                });

                });
        </script>
        
    @endpush




@endsection
