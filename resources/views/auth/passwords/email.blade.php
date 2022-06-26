@extends('layouts.master')

@section('title') {{'Restablecer contraseña'}} @endsection

@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/media/login/fondo2.jpg');">
        <div class="row g-0 justify-content-center bg-black-75">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                <!-- Reminder Block -->
                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                        <!-- Header -->
                        <div class="mb-2 text-center">
                            <a class="link-fx fw-bold fs-1" href="index.php">
                                <div class="logokori">
                                    <img src="/media/login/logokori.png" alt="" width="20%" height="20%">
                                </div>
                                <span class="text-dark">Kori</span><span class="text-primary">Mangastore</span>
                            </a>
                            <p class="text-uppercase fw-bold fs-sm text-muted">Restablecer contraseña</p>
                        </div>
                        <!-- END Header -->

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">

                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Dirección de correo electrónico">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <button type="submit" class="btn btn-hero btn-primary">
                                    <i class="fa fa-fw fa-reply opacity-50 me-1"></i>
                                    {{ __('Enviar enlace de restablecimiento de contraseña') }}
                                </button>
                            </div>

                        </form>
                        <!-- END Reminder Form -->
                    </div>
                </div>
                <!-- END Reminder Block -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
