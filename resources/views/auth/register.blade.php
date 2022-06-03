@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/media/register/FondoRegister.jpg');">
        <div class="row g-0 justify-content-center bg-black-75">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                <!-- Sign Up Block -->
                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                        <!-- Header -->
                        <div class="mb-2 text-center">
                            <div class="logokori">
                                <img src="/media/login/logokori.png" alt="" width="20%" height="20%">
                            </div>
                            <a class="link-fx fw-bold fs-1" href="index.php">
                                <span class="text-dark">Kori</span><span class="text-primary">Mangastore</span><br>
                            </a>
                            <p class="text-uppercase fw-bold fs-sm text-muted">Crear una cuenta nueva</p>
                        </div>
                        <!-- END Header -->

                        <!-- Sign Up Form -->
                        <form method="POST" class="validation" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        required autocomplete="name" autofocus placeholder="Nombre de usuario">


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
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope-open"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Dirección de correo electrónico">

                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-4" id="pwd-container">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">
                                        <i class="fa fa-asterisk"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="new-password"
                                        placeholder="Contraseña">

                                </div>
                                <div class="js-password pw-strength-progress mt-1"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <!-- Password-confirm -->
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">
                                        <i class="fa fa-asterisk"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password-confirm"
                                        name="password_confirmation" placeholder="Confirmar Contraseña" required
                                        autocomplete="new-password">
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {

            var options = {};
            options.ui = {
                container: "#pwd-container",
                viewports: {
                    progress: ".js-password"
                },
                showVerdicts: false,
                showVerdictsInsideProgressBar: false
            };
            options.rules = {
                activated: {
                    wordTwoCharacterClasses: true,
                    wordRepetitions: true
                },
                commonPasswords: ['12345678', 'password']
            };
            options.common = {
                debug: true,
                onLoad: function() {
                    $('#messages').text('Start typing password');
                }
            };
            $('#password').pwstrength(options);
        });
    </script>
    <script>
        // valid email pattern
        var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        $.validator.addMethod("validemail", function(value, element) {
            return this.optional(element) || eregex.test(value);
        });
        jQuery('.validation').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                    maxlength: 200
                },
                'email': {
                    required: true,
                    validemail: true,
                    email: true

                },
                'password': {
                    required: true,
                    maxlength: 64,
                    minlength: 8,
                },
                'password_confirmation': {
                    equalTo: "#password",
                    maxlength: 64,
                    minlength: 8,
                },

            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre de usuario.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.'
                },
                'email': {
                    required: 'Introduce tu dirección de e-mail',
                    validemail: 'Comprueba si el e-mail que has introducido es correcto',
                    email: 'Comprueba si el e-mail que has introducido es correcto',

                },
                'password': {
                    required: 'Introduce una contraseña.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.',
                    minlength: 'La contraseña debe tener al menos 8 caracteres'
                },
                'password_confirmation': {
                    equalTo: "El password debe ser igual al anterior",
                    required: 'Confirma tu contraseña',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.',
                    minlength: 'La contraseña debe tener al menos 8 caracteres'
                },
            },
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: "span",
            errorPlacement: function(error, element) {
                // Add the `csc-helper-text` class to the error element
                error.addClass("is-invalid invalid-feedback animated fadeIn");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            }
        });
    </script>
@endsection
