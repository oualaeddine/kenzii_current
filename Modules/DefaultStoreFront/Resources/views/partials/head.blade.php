<head>
    @include('OldStoreFront::partials.meta')
    <title>{{$page_title}}</title>

    {{-- thanks css page --}}
    <link rel="stylesheet" href="{{asset("store/css/general_style.css")}}">
    <link rel="stylesheet" href="{{asset('store/css/main_style.css')}}">
    <link rel="stylesheet" href="{{asset('store/css/reset_style.css')}}">
    {{-- our css --}}
    <link rel="stylesheet" href="{{asset('store_new/css/bootstrap.rtl.min.css')}}">
    <!-- Main Style of the template -->
    <link rel="stylesheet" href="{{asset('store_new/css/styles.css')}}">
    <!-- Landing Page Style -->
    <link rel="stylesheet" href="{{asset('store_new/css/override.bootstrap.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Awesomefont -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    {{--  font --}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" 
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" 
    integrity="sha512-bjwk1c6AQQOi6kaFhKNrqoCNLHpq8PT+I42jY/il3r5Ho/Wd+QUT6Pf3WGZa/BwSdRSIjVGBsPtPPo95gt/SLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{asset('store_new/images/logo.png')}}">

    @include('OldStoreFront::partials.facebook_pixel')

    @yield('css')
   
</head>
