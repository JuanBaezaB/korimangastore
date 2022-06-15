@extends('admin.template_list_no_ajax')

@php
$nombre_crud = 'Rol';
$add_action_route = 'role.add';
$update_action_route = 'role.update';
$delete_action_route = 'role.delete';

$collection_of_items = $roles;

$list_columns = 'admin.basic_management.user-management.role.role_columns';
$modal_edit_contents = 'admin.basic_management.user-management.role.role_edit';
$export_columns = [0, 1];

$validation_rules = [
    'name' => [
        'required' => true,
        'maxlength' => 200
    ]
];

$validation_messages = [
    'name' => [
        'required' => 'Por favor, ingrese un nombre.',
        'maxlength' => 'Por favor, ingrese no más de 200 caracteres.'
    ]
];
@endphp

@section('modal_create_contents')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
    @endif
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Roles:</label>
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]">
                    <label class="form-check-label" for="">{{ $permission->name }}</label>
                </div>
            @endforeach
    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Gestión de usuarios</li>
    <li class="breadcrumb-item active" aria-current="page">Roles</li>
@endsection


