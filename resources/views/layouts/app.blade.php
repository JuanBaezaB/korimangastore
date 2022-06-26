<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Korimangastore - @yield('title')</title>

    <!-- favicons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/kori/favicon-32x32.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/kori/android-chrome-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('media/favicons/kori/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('media/favicons/kori/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('media/favicons/kori/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('media/favicons/kori/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('media/favicons/kori/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/laravel.app.js') }}" defer></script>
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>

</head>

<body>
    @include('layouts.navbar-app')

    <main class="py-4">
        @yield('content')
    </main>


    @yield('js_after')
</body>

</html>
