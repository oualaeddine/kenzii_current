<head>
    @include('store.partials.meta')

    <title>{{$meta_title}}</title>

    <base href="{{$base_url}}">

    <script type="text/javascript">
        var base_url = "{{$base_url}}";
    </script>
    <!-- General CSS Settings -->
    <link rel="stylesheet" href="{{asset("store/css/general_style.css")}}">
    <!-- Main Style of the template -->
    <link rel="stylesheet" href="{{asset('store/css/main_style.css')}}">
    <!-- Landing Page Style -->
    <link rel="stylesheet" href="{{asset('store/css/reset_style.css')}}">
    <!-- Awesomefont -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    @yield('css')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    @include('store.partials.google_analytics')
    @include('store.partials.facebook_pixel')
</head>
