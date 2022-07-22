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
    <div class="content">

        <!-- Elements -->

        <!-- Pregunta 1 -->
        <div class="container">
            <div class="row">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <i class="fa-solid fa-circle-question pe-2"></i>
                        <h3 class="block-title">Pregunta 1</h3>
                        <div class="block-options">
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-message pe-2"></i><b>Respuesta: </b>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum nihil totam ab consectetur laboriosam non qui voluptate facilis cumque tempore aliquam, asperiores placeat expedita veritatis quaerat eaque! Similique, suscipit ratione!
                          </div>
                    </div>
                </div>

                <!-- Pregunta 2 -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <i class="fa-solid fa-circle-question pe-2"></i>
                        <h3 class="block-title">Pregunta 2</h3>
                        <div class="block-options">
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-message pe-2"></i><b>Respuesta: </b>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum nihil totam ab consectetur laboriosam non qui voluptate facilis cumque tempore aliquam, asperiores placeat expedita veritatis quaerat eaque! Similique, suscipit ratione!
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
