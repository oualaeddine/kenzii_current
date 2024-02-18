<head>
    @include('OldStoreFront::partials.meta')
    <title>{{$page_title}}</title>
    <!-- Main Style of the template -->

    <link rel="stylesheet" href="{{asset('kenzii_store/assets/css/style.css')}}" />
    <!-- Bootstrap Style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- Awesomefont -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    {{--  font --}}
    <link rel="stylesheet" href="{{asset('kenzii_store/assets/css/fonts.css')}}" />
    <!-- toast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    @include('OldStoreFront::partials.facebook_pixel')

    @yield('css')
   
</head>
