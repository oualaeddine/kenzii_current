<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{$page_title}}</title>


     <!-- Fav Icon -->
     <link rel="shortcut icon" href="{{asset('store_new/images/logo.png')}}">
    

     <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:300,400,500,600,700,800,900' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = "{{asset('dentaire/js/webfont.js')}}";
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>



    <link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/fontawesome-free/css/all.min.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/animate/animate.min.css')}}>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/magnific-popup/magnific-popup.min.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/owl-carousel/owl.carousel.min.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/nouislider/nouislider.min.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/photoswipe/photoswipe.min.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('dentaire/vendor/photoswipe/default-skin/default-skin.min.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" 
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />


    <!-- Main CSS File -->
    @if (\Request::route()->getName() == 'dentaire_store.index')
             <link rel="stylesheet" type="text/css" href={{asset('dentaire/css/demo-medical.min.css')}}>
    @else
            <link rel="stylesheet" type="text/css" href={{asset('dentaire/css/demo-medical.min.css')}}>
            <link rel="stylesheet" type="text/css" href={{asset('dentaire/css/style.min.css')}}>
    @endif
  
    {{-- <link rel="stylesheet" type="text/css" href={{asset('dentaire/css/style.min.css')}}> --}}
    @stack('css')
    
    @yield('css')
   
</head>
