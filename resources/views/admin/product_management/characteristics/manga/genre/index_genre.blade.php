@extends('admin.template_list_ajax')

@php

// COMMON
$nombre_crud = 'Genero'; // nombre con inicial en mayuscula del producto
$add_action_route = 'genre.add'; // ruta para accion de agregar
$update_action_route = 'genre.update'; // ruta para accion de actualizar
$delete_action_route = 'genre.delete'; // ruta para accion de eliminar

/*
        Se saca de controller, el argumento a compact()
    */
$collection_of_items = $genres;

// nombre de vista *_columns
$list_columns = 'admin.product_management.characteristics.manga.genre.genre_columns';
// nombre de serie *_serie
$modal_edit_contents = 'admin.product_management.characteristics.manga.genre.genre_edit';
$export_columns = [0, 1, 2];
$validation_rules = [
    'name' => ['required' => true, 'maxlength' => 100],
    'type' => ['required' => true]
];
$validation_messages = [
    'name' => [
        'required' => 'Por favor, ingrese un nombre.',
        'maxlength' => 'Por favor, ingrese no más de 100 caracteres.'
    ],
    'type' => [
        'required' => 'Por favor, selecciona uno.'
    ]
];


// AJAX ONLY
$get_one_route = 'genre.get_one';
$update_modal_fields = [
    [ 'inputName' => 'name' ],
    [ 'type' => 'select2', 'inputName' => 'type' ]
];

@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label @error('name') is-invalid @enderror">Nombre:</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Tipo:</label>
        <!-- Necesitamos el tipo de acuerdo a datos suministrados por el Cliente Korimangastore -->
        <select class="select-add form-select form-control force-js-select2 js-select2" name="type" style="width: 100%;"
            data-placeholder="Elige uno..." required>
            <option></option>
            <option value="Demografía">Demografía</option>
            <option value="Temático">Tematico</option>
        </select>

    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell" style="width: 30%;">Tipo</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Gestión de productos</li>
    <li class="breadcrumb-item">Caracteristicas</li>
    <li class="breadcrumb-item">Manga</li>
    <li class="breadcrumb-item active" aria-current="page">Generos</li>
@endsection
