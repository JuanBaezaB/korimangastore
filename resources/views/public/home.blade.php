@extends('layouts.app')

@section('title')
    {{ 'Home' }}
@endsection

@section('css_before')
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
            background-color: #00cbcc;

        }




    </style>
@endsection

@section('content')
    <!-- Page header with logo and tagline-->
    <header class="presentacion py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Bienvenido a Kori MangaStore</h1>
                <p class="lead mb-0">Disfruta de nuestra variedad de mangas y diversos productos.</p>
            </div>
        </div>
    </header>

    <!-- Products-->
    <section class="product">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card border-dark">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>
                            <a href="/reservar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-2"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>


                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card border-dark">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>
                            <a href="/reservar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-2"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card border-dark">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>
                            <a href="/reservar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-2"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card border-dark">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>
                            <a href="/reservar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-2"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card border-dark">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>
                            <a href="/reservar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-2"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card border-dark">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>
                            <a href="/reservar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-2"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card border-dark">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>
                            <a href="/reservar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-2"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pt-1 pb-1 text-center">
                    <a href="/articulo" style="text-decoration: none">
                        <div class="producto card border-dark">
                            <div class="card-body">
                                <img class="card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                            </div>
                            <h6 class="text-dark">Nombre Manga</h6>
                            <h5 class="text-dark">$12.990</h5>
                            <a href="/reservar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-2"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-outline-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>
                        </div>
                    </a>
                </div>


        </div>
        <!-- Pagination-->
        <nav aria-label="Pagination">
            <hr class="my-3" />
            <ul class="pagination justify-content-center my-4">
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

    <!-- Slider-->
    <section class="sliderpromo">

    </section>

@endsection


@section('js_after')
@endsection
