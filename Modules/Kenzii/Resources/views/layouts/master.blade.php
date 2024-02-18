<!DOCTYPE html>
<html lang="en" dir="rtl">
     @include('kenzii::partials.head')
    <body dir="rtl">
        @include('kenzii::partials.header')
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/productmi.js') }}"></script> --}}

        @include('kenzii::partials.footer')
        @include('kenzii::partials.js')
    </body>
</html>