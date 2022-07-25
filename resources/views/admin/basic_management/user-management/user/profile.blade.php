@extends('layouts.backend')

@section('title')
    {{ 'Perfil' }}
@endsection

@section('css_before')
    <style>
        .marca{
            text-shadow: 2px 2px 2px black;
        }
    </style>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('https://cdn.wallpapersafari.com/64/23/LChQ6l.png');">
        <div class="bg-black-75">
            <div class="content content-full">
                <div class="py-5 text-center">
                    <a class="img-link">
                        @if (Auth::user()->image != null)
                            <img class="img-avatar img-avatar96 img-avatar-thumb"
                                src="{{ asset('storage/' . Auth::user()->image) }}">
                        @endif
                        @if (Auth::user()->image == null)
                            <img class="img-avatar img-avatar96 img-avatar-thumb"
                                src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                        @endif
                    </a>
                    <h1 class="fw-bold my-2 text-white">Editar Perfil</h1>
                    <h2 class="h4 fw-bold text-white-75">
                        {{ Auth::user()->name }}
                    </h2>

                    @foreach ($lastLogin as $login)
                    <h4 class="text-white marca ">Tu última conexión fue el {{$login->added_on}}</h4>
                    @endforeach


                    <button type="button" class="edit btn btn-outline-primary bg-dark mt-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ver ultimas conexiones</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('user.editProfile', ['id' => auth()->user()->id]) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Perfil de Usuario
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                La información vital de tu cuenta. Su nombre de usuario será visible públicamente.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your username.." value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-email">Direccion de correo</label>
                                <input type="email" class="form-control" id="dm-profile-edit-email" name="email"
                                    placeholder="Enter your email.." value="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Tu avatar</label>
                                <div class="push">
                                    @if (Auth::user()->image != null)
                                        <img class="img-avatar img-avatar96 img-avatar-thumb"
                                            src="{{ asset('storage/' . Auth::user()->image) }}">
                                    @endif
                                    @if (Auth::user()->image == null)
                                        <img class="img-avatar img-avatar96 img-avatar-thumb"
                                            src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                                    @endif
                                </div>
                                <label class="form-label" for="dm-profile-edit-avatar">Selecciona un nuevo avatar</label>
                                <input type="file" class="form-control" name="image" id="dm-profile-edit-avatar"  accept="image/png, image/jpeg, image/jpg, image/svg">
                            </div>

                            <button type="submit" class="edit btn btn-primary mt-3 ">
                                Guardar Cambios
                            </button>
                        </div>
                    </div>
                </form>
                <!-- END User Profile -->

                <!-- Change Password -->

                <form action="{{ route('user.editPassword', ['id' => auth()->user()->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}

                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-asterisk text-muted me-1"></i> Cambio de contraseña
                    </h2>

                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Cambiar su contraseña de inicio de sesión es una manera fácil de mantener su cuenta segura.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-password">Contraseña actual</label>
                                <input id="password" type="password" class="form-control" name="current_password"
                                    autocomplete="current-password">
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="dm-profile-edit-password-new">Nueva contraseña</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        autocomplete="current-password">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="dm-profile-edit-password-new-confirm">Confirme su nueva
                                        contraseña</label>
                                    <input id="new_confirm_password" type="password" class="form-control"
                                        name="new_confirm_password" autocomplete="current-password">
                                </div>

                            </div>
                            <button type="submit" class="edit btn btn-primary mt-3 ">
                                Guardar Cambios
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Modal -->


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ultimas conexiones</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                                    <thead>
                                        <tr class="text-uppercase text-center">
                                            <th class="fw-bold">Fecha de conexion</th>
                                            <th class="d-none d-sm-table-cell fw-bold">Direccion de IP</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($lastFiveLogin as $login)
                                            <tr>
                                                <td class="fw-semibold">
                                                    {{ $login->added_on }}
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    {{ $login->ip_address }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <!-- END Change Password -->
            @endsection


            @section('js_after')
                <!-- Datatable -->
                <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
                <!-- End Datatable -->

                <!-- js sweetalert2 -->
                <script>
                    let toast = Swal.mixin({
                        buttonsStyling: false,
                        target: '#page-container',
                        customClass: {
                            confirmButton: 'btn btn-success m-1',
                            cancelButton: 'btn btn-danger m-1',
                            input: 'form-control'
                        }
                    });
                    @if (session('success') == 'updated-profile')
                        toast.fire(
                            'Actualizado!',
                            'Tus datos se actualizaron exitosamente.',
                            'success'
                        );
                    @endif
                    @if (session('success') == 'updated-password')
                        toast.fire(
                            'Actualizado!',
                            'Tu contraseña se actualizo exitosamente.',
                            'success'
                        );
                    @endif
                </script>
            @endsection
