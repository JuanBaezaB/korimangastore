@extends('layouts.app')

@section('title')
    {{ 'Home' }}
@endsection

@section('css_before')
    <link rel="stylesheet" href="{{asset('js/plugins/glider/glider.min.css')}}">
    <style>
        .mangas{
            height: 600px;
        }

        .desc{
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            overflow: hidden;
        }

        .presentacion{
            background-image: url("/media/login/portada3.png");
            background-position: center;
        }

        .producto{
            transition: background-color .5s;
        }

        .producto:hover{
            background-color: #00ffff;

        }

        .btn-dark:hover{
            text-decoration: underline;
            text-decoration-style: double;
            text-decoration-color: white;
        }

        .botoncito{
        transition: background-color .5s;
        background-color: black;
        border: white;
        border-style: solid;
        border-radius: 10px;
        color: white;
        text-decoration: none;
    }

    .botoncito p{
        color: white;
    }

    .botoncito:hover{
        background-color: #006574;
        text-decoration: none;
    }

    .carousel__anterior, .carousel__siguiente{
        position: absolute;
        display: block;
        width: 30px;
        height: 30px;
        border: none;
        top: calc(50% - 35px);
        cursor: pointer;
        line-height: 30px;
        text-align: center;
        background: none;
        color: black;
        opacity: 50%;
        transition: opacity .5s;

    }

    .carousel__anterior:hover, .carousel__siguiente:hover{
        opacity: 100%;

    }

    .carousel__anterior{
        left: -30px;
    }

    .carousel__siguiente{
        right: -30px;
    }

    .carousel__lista{
        overflow: hidden;
    }

    .carousel__elemento{
        text-align: center;
    }


    </style>
@endsection

@section('content')
    <!-- Page header with logo and tagline-->
    <header class="presentacion py-5 bg-light pb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Bienvenido a Kori MangaStore</h1>
                <p class="lead mb-0">Disfruta de nuestra variedad de mangas y diversos productos.</p>
            </div>
        </div>
    </header>

    <!-- Slider-->
    <section class="pt-3 mt-0 mw-100">

        <div class="container mw-100 ps-5 pe-5">
            <div class="text-center">
                <h3><b>Categorías Destacadas</b></h3>
                <hr>
                <p>Accede de forma rápida a las categorías más consultadas en nuestra tienda</p>
            </div>
            <div class="carousel pb-5">
                <div class="carousel__contenedor pb-2">
                    <button aria-label="Anterior" class="carousel__anterior d-sm-none d-md-block"><i class="fa-solid fa-chevron-left"></i></button>

                    <div class="carousel__lista pt-2 shadow">
                        <a href="" class="text-decoration-none">
                            <div class="carousel__elemento">
                                <img src="/media/categories/cat-1.jpg" alt="">
                                <p class="text-dark fw-bold">Ivrea (Argentina)</p>
                            </div>
                        </a>
                        <a href="" class="text-decoration-none">
                            <div class="carousel__elemento">
                                <img src="/media/categories/cat-2.jpg" alt="">
                                <p class="text-dark fw-bold">Ivrea (España)</p>
                            </div>
                        </a>
                        <a href="" class="text-decoration-none">
                            <div class="carousel__elemento">
                                <img src="/media/categories/cat-3.jpg" alt="">
                                <p class="text-dark fw-bold">One Piece</p>
                            </div>
                        </a>
                        <a href="" class="text-decoration-none">
                            <div class="carousel__elemento">
                                <img src="/media/categories/cat-4.jpg" alt="">
                                <p class="text-dark fw-bold">Spy x Family</p>
                            </div>
                        </a>
                        <a href="" class="text-decoration-none">
                            <div class="carousel__elemento">
                                <img src="/media/categories/cat-5.jpg" alt="">
                                <p class="text-dark fw-bold">Bolsas para Mangas</p>
                            </div>
                        </a>
                        <a href="" class="text-decoration-none">
                            <div class="carousel__elemento">
                                <img src="/media/categories/cat-6.jpg" alt="">
                                <p class="text-dark fw-bold">Figuras</p>
                            </div>
                        </a>
                    </div>

                    <button aria-label="Siguiente" class="carousel__siguiente"><i class="fa-solid fa-chevron-right"></i></button>
                </div>

                <div role="tablist" class="carousel__indicadores"></div>

            </div>
        </div>

    </section>

    <!-- Productos destacados -->
    <section class="bg-dark pt-3 pb-5">
        <div class="container">
            <div class="text-center text-light">
                <h3><b>Productos Destacados</b></h3>
                <hr>
                <p>Revisa nuestro catálogo de productos, los cuales esperan por ti.</p>
            </div>
            <div class="row">
                <!-- Articulo -->
                @isset($products)
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                            <a href="{{ route('show-product', $product->id) }}"style="text-decoration: none">
                                <div class="producto card shadow">
                                    <div class="card-body">
                                        <img class="card-img-top"
                                            src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg"
                                            alt="">
                                    </div>
                                    <h6 class="text-dark">{{ $product->name }}</h6>
                                    <h5 class="text-dark">${{ $product->price }}</h5>
                                    <h5 class="text-dark">{{ $product->category->name }}</h5>

                                    <a href="/reservar" type="button"
                                        class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i
                                            class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                                    <livewire:add-cart :product-id="$product->id">
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>

    </section>

    <!-- Novedades -->
    <section class="pt-3 pb-5">
        <div class="container">
            <div class="text-center">
                <h3><b>Novedades</b></h3>
                <hr>
                <p>Productos nuevos que han llegado especialmente para ti.</p>
            </div>
            <div class="row">
                <!-- Articulo -->
                @isset($products)
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                            <a href="{{ route('show-product', $product->id) }}"style="text-decoration: none">
                                <div class="producto card shadow">
                                    <div class="card-body">
                                        <img class="card-img-top"
                                            src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg"
                                            alt="">
                                    </div>
                                    <h6 class="text-dark">{{ $product->name }}</h6>
                                    <h5 class="text-dark">${{ $product->price }}</h5>
                                    <h5 class="text-dark">{{ $product->category->name }}</h5>

                                    <a href="/reservar" type="button"
                                        class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i
                                            class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                                    <livewire:add-cart :product-id="$product->id">
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>

@endsection


@section('js_after')
    <script src="{{asset('js/plugins/glider/glider.min.js')}}"></script>
    <script>
        var slider = new Glider(document.querySelector('.carousel__lista'), {
        slidesToShow: 1,
        slidesToScroll: 1,
        itemWidth: 150,
        duration: 0.5,
        rewind: true,
        draggable: true,
        dots: '.carousel__indicadores',
        arrows: {
            prev: '.carousel__anterior',
            next: '.carousel__siguiente'
        },
        responsive: [
            {
            // screens greater than >= 690px
            breakpoint: 690,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 2,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.5
            }
            },{
            // screens greater than >= 970px
            breakpoint: 970,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.5
            }
            },{
            // screens greater than >= 1280px
            breakpoint: 1280,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.5
            }
            }
        ]
        });

        slideAutoPaly(slider, '.glider');

        function slideAutoPaly(glider, selector, delay = 5000, repeat = true) {
            let autoplay = null;
            const slidesCount = glider.track.childElementCount;
            let nextIndex = 1;
            let pause = true;

            function slide() {
                autoplay = setInterval(() => {
                    if (nextIndex >= slidesCount) {
                        if (!repeat) {
                            clearInterval(autoplay);
                        } else {
                            nextIndex = 0;
                        }
                    }
                    glider.scrollItem(nextIndex++);
                }, delay);
            }

            slide();

            var element = document.querySelector(selector);
            element.addEventListener('mouseover', (event) => {
                if (pause) {
                    clearInterval(autoplay);
                    pause = false;
                }
            }, 300);

            element.addEventListener('mouseout', (event) => {
                if (!pause) {
                    slide();
                    pause = true;
                }
            }, 300);
        }
    </script>


@endsection
