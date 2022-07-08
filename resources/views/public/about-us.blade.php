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

                <p class="lead">A single, lightweight helper class allows you to add engaging, full width background images to sections of your page.</p>
                <p class="mb-0">The universe is almost 14 billion years old, and, wow! Life had no problem starting here on Earth! I think it would be inexcusably egocentric of us to suggest that we're alone in the universe.</p>
            </div>
        </div>
    </div>
</section>
<!-- Image element - set the background image for the header in the line below-->
<div class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/4ulffa6qoKA/1200x800')">
    <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
    <div style="height: 20rem"></div>
</div>
<!-- Content section-->
<section class="py-5">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Engaging Background Images</h2>
                <p class="lead">The background images used in this template are sourced from Unsplash and are open source and free to use.</p>
                <p class="mb-0">I can't tell you how many people say they were turned off from science because of a science teacher that completely sucked out all the inspiration and enthusiasm they had for the course.</p>
            </div>
        </div>
    </div>
</section>

@endsection


@section('js_after')
@endsection
