@extends('layouts.backend')

@section('title')
    {{ 'Profile' }}
@endsection

@section('content')


    <!-- Hero -->
    <div class="bg-image" style="background-image: url('https://cdn.wallpapersafari.com/64/23/LChQ6l.png');">
      <div class="bg-black-75">
        <div class="content content-full">
          <div class="py-5 text-center">
            <a class="img-link" href="be_pages_generic_profile.html">
                @if (Auth::user()->image != null)
                <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('storage/' . Auth::user()->image) }}">
            @endif
            @if (Auth::user()->image == null)
                <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
            @endif
            </a>
            <h1 class="fw-bold my-2 text-white">Editar Perfil</h1>
            <h2 class="h4 fw-bold text-white-75">
                {{ Auth::user()->name }}
            </h2>
            <a class="btn btn-secondary" href="be_pages_generic_profile.html">
              <i class="fa fa-fw fa-arrow-left opacity-50"></i>  Volver al Perfil
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-full content-boxed">
      <div class="block block-rounded">
        <div class="block-content">
          <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
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
                  <input type="text" class="form-control" id="dm-profile-edit-username" name="dm-profile-edit-username" placeholder="Enter your username.." value="{{Auth::user()->name}}">
                </div>
                <div class="mb-4">
                  <label class="form-label" for="dm-profile-edit-email">Direccion de correo</label>
                  <input type="email" class="form-control" id="dm-profile-edit-email" name="dm-profile-edit-email" placeholder="Enter your email.." value="{{Auth::user()->email}}">
                </div>
                <div class="mb-4">
                  <label class="form-label">Tu avatar</label>
                  <div class="push">
                    @if (Auth::user()->image != null)
                <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('storage/' . Auth::user()->image) }}">
            @endif
            @if (Auth::user()->image == null)
                <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
            @endif
                  </div>
                  <label class="form-label" for="dm-profile-edit-avatar">Selecciona un nuevo avatar</label>
                  <input class="form-control" type="file" id="dm-profile-edit-avatar">
                </div>
              </div>
            </div>
            <!-- END User Profile -->

            <!-- Change Password -->
            <h2 class="content-heading pt-0">
              <i class="fa fa-fw fa-asterisk text-muted me-1"></i> Cambio de contraseña
            </h2>
            <div class="row push">
              <div class="col-lg-4">
                <p class="text-muted">
                    Cambiar su contraseña de inicio de sesión es una manera fácil de mantener su cuenta segura.
                </p>
              </div>
              <div class="col-lg-8 col-xl-5">
                <div class="mb-4">
                  <label class="form-label" for="dm-profile-edit-password">Contraseña actual</label>
                  <input type="password" class="form-control" id="dm-profile-edit-password" name="dm-profile-edit-password">
                </div>
                <div class="row mb-4">
                  <div class="col-12">
                    <label class="form-label" for="dm-profile-edit-password-new">Nueva contraseña</label>
                    <input type="password" class="form-control" id="dm-profile-edit-password-new" name="dm-profile-edit-password-new">
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-12">
                    <label class="form-label" for="dm-profile-edit-password-new-confirm">Confirme su nueva contraseña</label>
                    <input type="password" class="form-control" id="dm-profile-edit-password-new-confirm" name="dm-profile-edit-password-new-confirm">
                  </div>
                </div>
              </div>
            </div>
            <!-- END Change Password -->
@endsection


