<!DOCTYPE html>
<html lang="en" >
     @include('barbarostools::layouts.meta')
     @include('barbarostools::partials.head')

     @stack('css')
     @include('barbarostools::partials.style')
   
    <body class="loaded">
        {{-- @include('dentairestore::partials.header') --}}
        @yield('content')

      {{--  @include('dentairestore::partials.cookies')--}}
        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/productmi.js') }}"></script> --}}

        @include('barbarostools::partials.js')

        <script>

            /***end to do*/
            localStorage.setItem('AllowCookiesBarbaros', true);

/*
            $allow_cookies = localStorage.getItem('AllowCookiesBarbaros') || true;
        
            if( $allow_cookies == 'true'){
                $('.cookiealert').hide();
            }else{
                $('.cookiealert').show();
            }
        
            $('.acceptcookies').on('click',function(){
                localStorage.setItem('AllowCookiesBarbaros', true);
                $('.cookiealert').hide();
            })
        */
            // hide cookies end 
        
        </script>

        @stack('js')

    
    </body>
</html>

