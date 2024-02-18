<!DOCTYPE html>
<html lang="ar" dir="rtl">
     @include('DefaultStoreFront::partials.head')
     <style>
        .cookiealert {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        margin: 0 !important;
        z-index: 999999;
        opacity: 1;
        visibility: visible;
        border-radius: 0;
        transform: translateY(0%);
        transition: all 500ms ease-out;
        color: #ecf0f1;
        background: #212327;
     }
     </style>
    <body dir="rtl">
        @include('DefaultStoreFront::partials.header')
        @yield('content')
        @include('dentairestore::partials.cookies')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/productmi.js') }}"></script> --}}

        @include('DefaultStoreFront::partials.js')
        @stack('js')

        <script>

            /***end to do*/
            
            $allow_cookies = localStorage.getItem('AllowCookiesDefault') || false;
            
            if( $allow_cookies == 'true'){
                $('.cookiealert').hide();
            }else{
                $('.cookiealert').show();
            }
            
            $('.acceptcookies').on('click',function(){
                localStorage.setItem('AllowCookiesDefault', true);
                $('.cookiealert').hide();
            })
            
            // hide cookies end 
            
            </script>
    </body>
</html>
