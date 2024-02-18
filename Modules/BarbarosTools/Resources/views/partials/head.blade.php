<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{Config::get('app.name')}} | {{$page_title}}</title>


     <!-- Fav Icon -->
     @if (Config::get('app.url') == 'https://bodyfuel.shop/')
        <link rel="shortcut icon" href='/fav_bodyfuel.png'>
     @else
        <link rel="shortcut icon" href='/store_new/images/logo.png'>
     @endif
     



    <link rel="stylesheet" type="text/css" href="/dentaire/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href='/dentaire/vendor/animate/animate.min.css'>

    <!-- Plugins CSS File -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" 
    integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href='/dentaire/vendor/owl-carousel/owl.carousel.min.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />

    
    <!-- Main CSS File -->

    <link rel="stylesheet" type="text/css" href='/dentaire/css/demo6.min.css'>
  
    @if (!Route::is('barbarostools.track') && !Route::is('barbarostools.faq') && !Route::is('barbarostools.track.show') && !Route::is('barbarostools.contact') &&  !Route::is('barbarostools.terms') && !Route::is('barbarostools.privacy') )

         @include('OldStoreFront::partials.facebook_pixel')

    @endif
   
  
    @yield('css')
   
</head>
