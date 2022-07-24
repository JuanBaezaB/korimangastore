@extends('layouts.error')

@section('title')
{{ 'Preguntas Frecuentes' }}
@endsection

@section('css_before')
<style>
    .marca {
        text-shadow: 2px 2px 2px black;
    }
</style>
@endsection


@section('content')
<header class="pt-3 pb-1 bg-image-full" style="background-image: url('/media/login/portada1.png')">
    <div class="text-center mt-5">
        <img class="img-fluid mb-4" src="/media/login/logosombra.png" alt="..." width="150px" height="150px" />
        <h1 class="marca text-white fs-2"><b>Kori</b>MangaStore</h1>
    </div>
</header>

<!-- Content section-->
<section class="pt-3">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-danger"><b>Oooops, ha ocurrido un problema...</b></h3>
                <hr>
                <div class="imagen mw-100">
                    <img class="mw-100" src="/media/logo/mascota-error1.png" alt="Mascota">
                </div>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                        <h3 class="mw-100"><b><i class="fa-solid fa-circle-info pe-2"></i>Error.</b> La dirección a la que intentas ingresar, no está disponible.</h3>
                    </div>
                  </div>
                <br>
                <h5>Puedes regresar a nuestra página de <a href="/">inicio</a>.</h5>
                <br>
            </div>


        </div>
    </div>
</section>

@endsection


@section('js_after')
@endsection
