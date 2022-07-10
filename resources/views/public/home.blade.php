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
    <section class="pt-3 mt-0">

        <div class="container">
            <div class="text-center">
                <h3><b>Categorías Destacadas</b></h3>
                <hr>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elitof.</p>
            </div>
            <div class="carousel pb-5">
                <div class="carousel__contenedor pb-2">
                    <button aria-label="Anterior" class="carousel__anterior"><i class="fa-solid fa-chevron-left"></i></button>

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

    <!-- Products-->
    <section class="product bg-dark pt-3">
        <div class="container">
            <div class="text-center text-light">
                <h3><b>Productos Destacados</b></h3>
                <hr>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elitof.</p>
            </div>
            <div class="row">

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <!-- Articulo -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>

                            <a href="/reservar" type="button" class="botoncito ms-4 me-4 mb-2 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="botoncito ms-4 me-4 mb-3 ps-2 pe-2 pt-2 pb-2 text-light"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>



        </div>
        <!-- Pagination-->
        <nav aria-label="Pagination">
            <hr class="mt-3" />
            <ul class="pagination justify-content-center pb-3">
                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fa-solid fa-circle-arrow-left"></i></a></li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                <li class="page-item"><a class="page-link" href="#!">15</a></li>
                <li class="page-item"><a class="page-link" href="#!"><i class="fa-solid fa-circle-arrow-right"></i></a></li>
            </ul>
        </nav>
    </section>

@endsection


@section('js_after')
    <script src="{{asset('js/plugins/glider/glider.min.js')}}"></script>
    <script src="{{asset('js/lib/jquery.min.js')}}"></script>
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
            // screens greater than >= 775px
            breakpoint: 576,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 2,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.5
            }
            },{
            // screens greater than >= 1024px
            breakpoint: 800,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 2,
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
