<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Icons -->
   <link rel="shortcut icon" href="{{ asset('media/favicons/kori/favicon-32x32.png') }}">
   <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/kori/android-chrome-192x192.png') }}">
   <link rel="apple-touch-icon" sizes="180x180" href="{{asset('media/favicons/kori/apple-touch-icon.png')}}">
   <link rel="icon" type="image/png" sizes="32x32" href="{{asset('media/favicons/kori/favicon-32x32.png')}}">
   <link rel="icon" type="image/png" sizes="16x16" href="{{asset('media/favicons/kori/favicon-16x16.png')}}">
   <link rel="manifest" href="{{asset('media/favicons/kori/site.webmanifest')}}">
   <link rel="mask-icon" href="{{asset('media/favicons/kori/safari-pinned-tab.svg')}}" color="#5bbad5">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    <link rel="stylesheet" id="css-main" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Korimangastore - @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('/fonts/fontawesome-free/css/all.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>

</head>
<body>
    <main>
        @yield('content')
    </main>

    @yield('js')

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Dashmix Core JS -->
    <!--<script src="{{ asset('js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('js/dashmix.core.min.js') }}"></script>-->

</body>
</html>
