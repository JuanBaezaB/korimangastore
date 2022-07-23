@extends('layouts.app')

@section('title')
    {{ 'Carrito' }}
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
        <livewire:list-cart>
    </div>
</section>
@endsection


@section('js_after')
@endsection
