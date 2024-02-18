<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ar" dir="rtl">
@include('OldStoreFront::partials.head')
@include('OldStoreFront::partials.header')
<body>
@yield('content')
This site is not part of the Facebook website or Facebook Inc. Additionally, this site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.
<a href="{{route("store.terms")}}" class="">Terms of service</a>
<a href="{{route("store.policy")}}" class="">Privacy policy</a>
@include('OldStoreFront::partials.footer')
</body>
@include('OldStoreFront::partials.js')
</html>




