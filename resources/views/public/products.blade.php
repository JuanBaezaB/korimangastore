@extends('layouts.app')

@section('title')
    {{ 'Home' }}
@endsection'

@section('css_before')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

@section('content')
    <header class="presentacion py-5 bg-light pb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Bienvenido a Kori MangaStore</h1>
                <p class="lead mb-0">Disfruta de nuestra variedad de mangas y diversos productos.</p>
            </div>
        </div>
    </header>

    <section>
        <div class="row">
            <div class="col-12">
                <!-- filter component -->
                <livewire:filter-products />
            </div>
            <div class="col-12">
                <!-- show product component -->
                <livewire:show-products />
            </div>
        </div>
    </section>
@endsection


@section('js_after')
@endsection
