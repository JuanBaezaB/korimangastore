@extends('layouts.app')

@section('title')
    {{ 'Soporte' }}
@endsection

@section('css_before')

<style>
    .input-group-text{
        width: 40px;
    }

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
    <div class="container my-5">
        <div class="row justify-content-center">

            <div class="col-12">
                @if ($errors->any())
                <ul>
                    <div id="ERROR_COPY" class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }} <br></li>
                        @endforeach
                    </div>
                </ul>
                <br />
            @endif
            </div>

            <div class="col-lg-6 text-center">
                <h2><b>¿Tienes un problema?</b> ¡Infórmanos aquí!</h2>
                <hr>
                <form action="{{ route('user-question-pub') }}" class="validation" method="POST">

                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                        <input id="email" name="email" type="text" class="form-control" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1">

                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-indent"></i></span>
                        <input id="title" name="title" type="text" class="form-control" placeholder="Asunto" aria-label="Username" aria-describedby="basic-addon1">

                    </div>

                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                        <textarea id="description" name="description" class="form-control" aria-label="With textarea" placeholder="Describe tu problema"></textarea>

                    </div>
                    <button type="submit" class="btn btn-success mt-3 mb-5">Enviar</button>
                </form>



                <p class="lead">Si tienes problema con un producto, la visualización de alguno, reclamo o sugerencia, entonces te leemos.</p>
            </div>
        </div>
    </div>
</section>


@endsection


@section('js_after')
@endsection
