@extends('layouts.app')

@section('title')
    {{ 'Nosotros' }}
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
<!-- Content section-->
<section class="pt-2 pb-2">
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header"><b>Tu pedido</b></div>
                    <div class="card-body">

                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 pt-2 pb-2 text-center">
                                            <img class="shadow mw-100" src="/media/products/gato4.jpg" alt="" width="160px" height="160px">
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 pt-2 pb-2">
                                            <p><b>Nombre Artículo: </b>El hombre y el gato 4</p>
                                            <p><b>Precio: </b>$12.990</p>
                                            <p><b>Cantidad:</b></p>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <button type="button" class="btn btn-danger">-</button>
                                                <input type="text" class="form-control" placeholder="1">
                                                <button type="button" class="btn btn-success">+</button>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-primary mt-3">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 pt-2 pb-2 text-center">
                                            <img class="shadow mw-100" src="/media/products/nezuko.jpg" alt="" width="160px" height="160px">
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 pt-2 pb-2">
                                            <p><b>Nombre Artículo: </b>Figura Nezuko Kamado</p>
                                            <p><b>Precio: </b>$7.990</p>
                                            <p><b>Cantidad:</b></p>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <button type="button" class="btn btn-danger">-</button>
                                                <input type="text" class="form-control" placeholder="2">
                                                <button type="button" class="btn btn-success">+</button>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-primary mt-3">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item text-center">
                                <p><b>Total pedido: </b>$28.970</p>
                                <button type="button" class="btn btn-success">
                                    <i class="fa-solid fa-credit-card pe-2"></i>
                                    Ir a pagar
                                </button>
                            </li>
                          </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('js_after')
@endsection
