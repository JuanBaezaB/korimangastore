@extends('admin.template_list_no_ajax')

@php
$nombre_crud = 'Permiso';
$add_action_route = 'permission.add';
$update_action_route = 'permission.update';
$delete_action_route = 'permission.delete';

$collection_of_items = $permissions;

$list_columns = 'admin.basic_management.user-management.permission.permission_columns';
$modal_edit_contents = 'admin.basic_management.user-management.permission.permission_edit';
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
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
    <th>Descripción</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Gestión de usuarios</li>
    <li class="breadcrumb-item active" aria-current="page">Permisos</li>
@endsection


