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
<section class="py-5">
    <div class="container my-5">
        <div class="row text-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <iframe class="mw-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d399.20850389574383!2d-73.05272553354718!3d-36.82647408970006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9669b5da9927f84f%3A0x716bb9842b0c12be!2zRnJlaXJlIDUyMiwgQ29uY2VwY2nDs24sIELDrW8gQsOtbw!5e0!3m2!1sen!2scl!4v1657294086828!5m2!1sen!2scl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <h2>Visitanos en nuestra tienda física</h2>

                <p class="card-text lead">
                    Nos encontramos en Freire #522, Galería Caracol, 4to piso, Local 185. Concepción.
                    <br>
                    Horario de atención: Lunes a Viernes de 11:00 am - 19:00 pm.
                </p>

            </div>
        </div>
    </div>
</section>
<!-- Image element - set the background image for the header in the line below
    <div class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/4ulffa6qoKA/1200x800')">
    Put anything you want here! The spacer below with inline CSS is just for demo purposes!
    <div style="height: 20rem"></div>
    </div>
-->

<header class="pt-3 pb-1 bg-image-full" style="background-image: url('/media/login/portada1.png')">
    <div class="text-center mt-5">
        <img class="img-fluid mb-4" src="/media/login/logosombra.png" alt="..." width="150px" height="150px"/>
        <h1 class="marca text-white fs-2"><b>Kori</b>MangaStore</h1>
    </div>
</header>
<section class="py-5">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card-body border-0">
                    <h2>Nuestra Misión</h2>
                    <p class="lead">Tener el catálogo más grande de mangas de Chile,
                        trayendo los mejores precios y sucursales en todo el país.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card-body border-0">
                    <h2>Nuestra Visión</h2>
                    <p class="lead">Entregar una excelente experiencia de compra, encargo o
                        visita a nuestra tienda, entregar precios bajos, ofertas y variedad de productos.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('js_after')
@endsection
