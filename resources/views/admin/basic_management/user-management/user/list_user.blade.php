@extends('admin.template_list_no_ajax')

@php
$nombre_crud = 'Usuario';
$add_action_route = 'user.add';
$update_action_route = 'user.update';
$delete_action_route = 'user.delete';

$collection_of_items = $users;

$list_columns = 'admin.basic_management.user-management.user.user_columns';
$modal_edit_contents = 'admin.basic_management.user-management.user.user_edit';
$export_columns = [0, 1, 2];

$validation_rules = [
    'name' => [
        'required' => true,
        'maxlength' => 200
    ],
    'email' => [
        'required' => true,
        'email' => true
    ],
    'roles[]' => [
        'required' => true
    ],
    'password' => [
        'required' => true,
        'maxlength' => 64,
        'minlength' => 8,
    ]
];

$validation_messages = [
    'name' => [
        'required' => 'Por favor, ingrese un nombre.',
        'maxlength' => 'Por favor, ingrese no más de 200 caracteres.'
    ],
    'email' => [
        'required' => 'Por favor, ingrese un email.',
        'email' => 'Comprueba si el e-mail que has introducido es correcto',
    ],
    'roles[]' => [
        'required' => 'Por favor, selecciona al menos un rol.',
    ],
    'password' => [
        'required' =>  'Introduce una contraseña.',
        'maxlength' => 'Por favor, ingrese no más de 64 caracteres.',
        'minlength' => 'La contraseña debe tener al menos 8 caracteres',
    ]
];

@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Email:</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label" >Imagen:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="" id="image" accept="image/png, image/jpeg, image/jpg, image/svg">
    </div>
    <div class="mb-3">
        <label class="col-form-label">Contraseña:</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror"
            id="password" name="password" required autocomplete="new-password"
            placeholder="Contraseña">
    </div>


    <div class="mb-3">
        <label class="col-form-label">Roles:</label>
        <br>
        @foreach ($roles as $rol)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $rol->id }}" name="roles[]">
                <label class="form-check-label" for="">{{ $rol->name }}</label>
            </div>
        @endforeach
    </div>

@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell">Email</th>
    <th class="d-none text-center d-sm-table-cell">Imagen</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Gestión de usuarios</li>
    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
@endsection
