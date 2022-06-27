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
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="/media/login/portada1.png" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2022</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="mangas card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Manga 1</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="mangas card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/19/8fc996cb156fc9af4b082ff601b86a7740d42b2c.jpeg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Manga 2</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="mangas card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/18/5002f1fe13c8bee43dc73547bbadb272d6f9cefd.jpeg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Manga 3</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="mangas card-img-top" src="https://www.normaeditorial.com/upload/media/albumes/0001/22/ca2b786a5a7ac145f03ec96875d88744abd87ba2.jpeg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2022</div>
                                <h2 class="card-title h4">Manga 4</h2>
                                <p class="card-text desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
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
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header bg-info"><b>¡Busca tu producto aquí!</b></div>
                    <div class="card-body bg-info">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Ingresa el nombre de lo que buscas" aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-dark" id="button-search" type="button">Buscar</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header bg-info"><b>Categorías</b></div>
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Mangas</a></li>
                                    <li><a href="#!">Figuras</a></li>
                                    <li><a href="#!">Poleras</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Bolsas</a></li>
                                    <li><a href="#!">Llaveros</a></li>
                                    <li><a href="#!">Y más...</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-info"><b>Avisos</b></div>
                    <div class="card-body bg-dark text-info">Algún aviso, alerta, o apartado de promociones.</div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js_after')
@endsection
