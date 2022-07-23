@extends('layouts.app')

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
            <div class="text-center">
                <h3><b>Preguntas Frecuentes</b></h3>
                <hr>
                <p>¿Tienes alguna consulta o duda? Puede que la encuentres aquí</p>
            </div>

            <!-- Pregunta 1 -->
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <b><i class="fa-solid fa-circle-question pe-2"></i> Pregunta 1 <!-- title --> </b>
                    </div>
                    <div class="card-body">

                        <div class="card border-0 ps-3 pe-3 pb-3">
                            <p class="card-text pt-2"><i class="fa-solid fa-comment pe-2"></i> Aquí una descripción del problema. <!-- description --></p>

                        </div>

                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-message pe-2"></i><b>Respuesta: </b>Lorem ipsum dolor sit amet
                            consectetur, adipisicing elit. Nostrum nihil totam ab consectetur laboriosam non qui voluptate
                            facilis cumque tempore aliquam, asperiores placeat expedita veritatis quaerat eaque! Similique,
                            suscipit ratione!
                            <!-- answer -->
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
