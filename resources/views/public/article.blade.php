@extends('layouts.app')

@section('title')
    {{ 'Nombre Articulo' }}
@endsection

@section('css_before')
    <style>
        .marca{
        text-shadow: 2px 2px 2px black;
        }

    </style>
@endsection

@section('content')
<header class="pt-3 pb-1 bg-image-full" style="background-image: url('/media/login/portada1.png')">
    <div class="text-center mt-5">
        <img class="img-fluid mb-4" src="/media/login/logosombra.png" alt="..." width="150px" height="150px"/>
        <h1 class="marca text-white fs-2"><b>Kori</b>MangaStore</h1>
    </div>
</header>

<!-- Detalle Articulo -->
<section class="detalle">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-sm-12">
                <div class="card-body">
                    <img class="card-img shadow" src="https://www.normaeditorial.com/upload/media/albumes/0001/17/cdcf47aecb0a210dec3d7cdff3dfbdd2c0a82995.jpeg" alt="">
                </div>

            </div>
            <div class="col-lg-7 col-md-8 col-sm-12 pt-3">

                <div class="card text-dark shadow mb-3">
                    <div class="card-header bg-info"><b>Nombre Artículo</b></div>
                    <div class="card-body">
                        <h5 class="card-title">Precio: <b>$12.990</b></h5>
                        <p class="card-text"><b>Autor: </b>Umi Sakurai</p>
                        <p class="card-text"><b>Tipo: </b>Manga</p>
                        <p class="card-text"><b>Saga: </b>El hombre y el gato</p>
                        <p class="card-text"><b>Editorial: </b>Norma</p>

                        <p class="card-text">
                            <b>Descripción:</b>
                            <br>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et ullam consequatur vitae perspiciatis corrupti asperiores ex illum, distinctio amet laudantium voluptas ratione exercitationem ad. Nesciunt dignissimos hic doloribus numquam quidem.
                        </p>

                        <div class="text-center card-text">
                            <a href="/reservar" type="button" class="btn btn-warning border-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-bookmark"></i>Reservar</a>
                            <a href="/comprar" type="button" class="btn btn-success border-dark ms-4 me-4 mb-3"><i class="pe-2 fa-solid fa-cart-plus"></i>Agregar al Carrito</a>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</section>


@endsection


@section('js_after')
@endsection
