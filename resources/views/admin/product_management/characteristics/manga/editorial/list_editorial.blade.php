@extends('admin.template_list_ajax')

@php
    $nombre_crud = 'Editorial'; // nombre con inicial en mayuscula del producto
    $add_action_route = 'editorial.add'; // ruta para accion de agregar
    $update_action_route = 'editorial.update'; // ruta para accion de actualizar
    $delete_action_route = 'editorial.delete'; // ruta para accion de eliminar

    /*
        Se saca de controller, el argumento a compact()
    */
    $collection_of_items = $editorials;

    // nombre de vista *_columns
    $list_columns = 'admin.product_management.characteristics.manga.editorial.editorial_columns';
    // nombre de serie *_serie
    $modal_edit_contents = 'admin.product_management.characteristics.manga.editorial.editorial_edit';
    $export_columns = [0,1,2];
    $validation_rules = [
        'name' => ['required' => true, 'maxlength' => 100],
        'origin' => ['required' => true]
    ];
    $validation_messages = [
        'name' => [
            'required' => 'Por favor, ingrese un nombre.',
            'maxlength' => 'Por favor, ingrese no más de 100 caracteres.'
        ],
        'origin' => [
            'required' => 'Por favor, selecciona uno.'
        ]
    ];


    // AJAX ONLY
    $get_one_route = 'editorial.get_one';
    $update_modal_fields = [
        [ 'inputName' => 'name' ],
        [ 'type' => 'select2', 'inputName' => 'origin' ]
    ];
@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Origen:</label>
        <select class="select-add form-select form-control force-js-select2 js-select2" name="origin" style="width: 100%;" data-placeholder="Elige uno.." required>
            <option></option>
            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
            <option value="Argentina">Argentina</option>
            <option value="Mexico">Mexico</option>
            <option value="España">España</option>
        </select>
    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell" style="width: 30%;">Origen</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Caracteristicas</li>
    <li class="breadcrumb-item">Manga</li>
    <li class="breadcrumb-item active" aria-current="page">Editorial</li>
@endsection
