<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kori MangaStore - Home Page</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- MDB 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet"/>
    -->

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0; 
            
            /* Show it is fixed to the top */
            min-height: 75rem;
            padding-top: 3.5rem;
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(27, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .mangas{
            max-width: 300px;
            max-height: 700px;
            object-fit: contain;
        }

    </style>
</head>

<body class="antialiased">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: #f7fafc" style="text-decoration-line: none">
                <img src="/media/login/logonav.png" alt="" width="32" height="28">
                <b>Kori</b>MangaStore
            </a>
            <div class="d-inlineflex pe-1">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <a style="color: #fff" class="text-sm btn btn-secondary text-gray-700 dark:text-gray-500 underline"  href="{{ route('login') }}">
                            <b>
                                <i class="fa-solid fa-user-plus pe-2"></i>
                                {{ __('Acceso') }}
                            </b>
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a class="text-sm btn btn-warning text-gray-700 dark:text-gray-500 underline" class="nav-link" href="{{ route('register') }}">
                            <b>
                                <i class="fa-solid fa-user-plus pe-2"></i>
                                {{ __('Registro') }}
                            </b>
                        </a>
                    @endif
                @else
                     @hasrole('Admin')
                        <div class="d-inline">
                            <a href="{{ url('/home') }}" class="text-sm btn btn-info text-gray-700 dark:text-gray-500 underline">
                                <b>
                                    <i class="fa-solid fa-chart-line pe-2"></i>
                                    Dashboard
                                </b>
                            </a>
                        </div>
                    @endhasrole
                    <div class="d-inline dropdown">
                        <a id="navbarDropdown" class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <b>
                                {{ Auth::user()->name }}
                            </b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <b>
                                    <i class="fa-solid fa-door-closed"></i>
                                    {{ __('Cerrar Sesión') }}  
                                </b>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>


    <!-- Contenido -->
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 ms-3 me-3 pb-3">
                <div class="logokori">
                    <a href="#">
                        <img src="/media/login/logokori.png" alt="" width="80px" height="70px">
                        <span style="font-size: 30px"><b>Kori</b>MangaStore</span>
                    </a>

                </div>
            </div>

            <!-- Carrusel -->
            <div class="card dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg mt-4 mb-4">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://wwwhatsnew.com/wp-content/uploads/2022/03/Estas-son-las-mejores-apps-de-fondos-de-pantalla-4K-y-QHD-para-2022.jpg"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Encuentra aquí tu manga favorito</h5>
                                <p>Revisa nuestro amplio catálogo y consulta por el tuyo.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://wwwhatsnew.com/wp-content/uploads/2022/03/Estas-son-las-mejores-apps-de-fondos-de-pantalla-4K-y-QHD-para-2022.jpg"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Figuras</h5>
                                <p>Tenemos figuras de Qposquet.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://wwwhatsnew.com/wp-content/uploads/2022/03/Estas-son-las-mejores-apps-de-fondos-de-pantalla-4K-y-QHD-para-2022.jpg"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Preventa</h5>
                                <p>Preventa de One Piece en variados tomos.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Productos -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="mangas" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg">
                        <div class="card-body">
                            <h5 class="card-title">El hombre y el gato N° 5</h5>
                            <p class="card-text">$ 9.990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img class="mangas" src="https://thumbs.dreamstime.com/b/libro-gen%C3%A9rico-992522.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Captain Tsubasa N° 9</h5>
                            <p class="card-text">$ 12.990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img class="mangas" src="https://thumbs.dreamstime.com/b/libro-gen%C3%A9rico-992522.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Mi nueva vida como villana N° 1</h5>
                            <p class="card-text">$ 13.990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img class="mangas" src="https://thumbs.dreamstime.com/b/libro-gen%C3%A9rico-992522.jpg">
                        <div class="card-body">
                            <h5 class="card-title">El hombre y el gato N° 1</h5>
                            <p class="card-text">$ 9.990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img class="mangas" src="https://thumbs.dreamstime.com/b/libro-gen%C3%A9rico-992522.jpg">
                        <div class="card-body">
                            <h5 class="card-title">El hombre y el gato N° 2</h5>
                            <p class="card-text">$ 9.990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img class="mangas" src="https://thumbs.dreamstime.com/b/libro-gen%C3%A9rico-992522.jpg">
                        <div class="card-body">
                            <h5 class="card-title">El hombre y el gato N° 3</h5>
                            <p class="card-text">$ 9.990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <span style="font-size: 220%"><i class="fa-brands fa-instagram"></i></span>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    href="https://www.instagram.com/korimangastore/"
                                    class="underline text-gray-900 dark:text-white">Instagram</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Siguenos en nuestro perfil en Instagram, enterate de novedades y participa de concursos.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <span style="font-size: 220%"><i class="fa-brands fa-facebook"></i></span>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    href="https://www.facebook.com/Kori-Manga-Store-108678028046259"
                                    class="underline text-gray-900 dark:text-white">Facebook</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Visita nuestra Fan Page en Facebook, enterate de novedades, noticias, artículos y
                                reacciona a nuestras publicaciones.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <span style="font-size: 220%"><i class="fa-solid fa-location-dot"></i></span>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    href="https://www.google.com/maps/@-36.8264254,-73.0528476,20z"
                                    class="underline text-gray-900 dark:text-white">Tienda Física</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Nos encontramos en Freire #522, Galería Caracol, 4to piso, Local 185. Concepción.
                                <br>
                                Horario de atención: Lunes a Viernes de 11:00 am - 19:00 pm.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <span style="font-size: 220%"><i class="fa-solid fa-book"></i></span>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a
                                    href="https://docs.google.com/spreadsheets/d/1kugVxHfw2fqV2WfjXpl8Ejt9hO0GGm02qgLUAi7TEuE/edit#gid=0"
                                    class="underline text-gray-900 dark:text-white">Revisa nuestro catálogo</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Revisa el stock de nuestros productos.
                                <br>
                                Pronto tendremos para tí nuestra Tienda Virtual, donde podrás revisar nuestro catálogo,
                                con fotos, descripción, y promociones de nuestros productos, además de envíos a todo
                                Chile.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <h5>Kori - Copyright 2022.</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/207ceca2f0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
