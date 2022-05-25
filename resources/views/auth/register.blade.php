@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/media/photos/photo14@2x.jpg');">
        <div class="row g-0 justify-content-center bg-black-75">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                <!-- Sign Up Block -->
                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                        <!-- Header -->
                        <div class="mb-2 text-center">
                            <a class="link-fx fw-bold fs-1" href="index.php">
                                <span class="text-dark">Kori</span><span class="text-primary">Mangastore</span><br>
                            </a>
                            <p class="text-uppercase fw-bold fs-sm text-muted">Crear una cuenta nueva</p>
                        </div>
                        <!-- END Header -->

                        <!-- Sign Up Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        required autocomplete="name" autofocus placeholder="Nombre de usuario">

                                    <span class="input-group-text">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Dirección de correo electrónico">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope-open"></i>
                                    </span>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="new-password"
                                        placeholder="Contraseña">
                                    <span class="input-group-text">
                                        <i class="fa fa-asterisk"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Password-confirm -->
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="password" class="form-control" id="password-confirm"
                                        name="password_confirmation" placeholder="Confirmar Contraseña" required
                                        autocomplete="new-password">
                                    <span class="input-group-text">
                                        <i class="fa fa-asterisk"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <button type="submit" class="btn btn-hero btn-primary">
                                    <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Crear Cuenta
                                </button>
                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-center">
                                    @if (Route::has('login'))
                                        <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1"
                                            href="{{ route('login') }}">
                                            <i class="fa fa-sign-in-alt opacity-50 me-1"></i> {{ __('Iniciar Sesión') }}
                                        </a>
                                    @endif
                                    
                                </p>
                            </div>

                        </form>
                        <!-- END Sign Up Form -->
                    </div>
                </div>
            </div>
            <!-- END Sign Up Block -->
        </div>


        <!-- END Terms Modal -->
    </div>
    <!-- END Page Content -->
@endsection
