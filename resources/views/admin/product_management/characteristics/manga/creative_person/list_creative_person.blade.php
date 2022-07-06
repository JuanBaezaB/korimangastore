@extends('admin.template_list_no_ajax')

@php
$nombre_crud = 'Persona creativa'; // nombre con inicial en mayuscula del producto
$add_action_route = 'creative_person.add'; // ruta para accion de agregar
$update_action_route = 'creative_person.update'; // ruta para accion de actualizar
$delete_action_route = 'creative_person.delete'; // ruta para accion de eliminar

/*
        Se saca de controller, el argumento a compact()
    */
$collection_of_items = $creative_people;

// nombre de vista *_columns
$list_columns = 'admin.product_management.characteristics.manga.creative_person.creative_person_columns';
// nombre de serie *_serie
$modal_edit_contents = 'admin.product_management.characteristics.manga.creative_person.creative_person_edit';
$export_columns = [0, 1];
$validation_messages = [
    'name' => [
        'required' => 'Por favor, ingrese un nombre.',
        'maxlength' => 'Por favor, ingrese no más de 200 caracteres.'
    ]
];
$validation_rules = [
    'name' => [
        'required' => true,
        'maxlength' => 200
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
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Gestión de productos</li>
    <li class="breadcrumb-item">Caracteristicas</li>
    <li class="breadcrumb-item">Manga</li>
    <li class="breadcrumb-item active" aria-current="page">Persona creativa</li>
@endsection
