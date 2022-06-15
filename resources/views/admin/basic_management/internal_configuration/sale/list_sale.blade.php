@extends('admin.template_list_ajax')

@php
$nombre_crud = 'Ventas';
$add_action_route = 'sale.add';
$update_action_route = 'sale.update';
$delete_action_route = 'sale.delete';

$collection_of_items = $sales;

$list_columns = 'admin.basic_management.internal_configuration.sale.sale_columns';
$modal_edit_contents = 'admin.basic_management.internal_configuration.sale.sale_edit';
$export_columns = [0, 1, 2, 3, 4];

$validation_rules = [
    'name' => [
        'required' => 'Por favor, ingrese un nombre para la sucursal.',
        'maxlength' => 'Por favor, ingrese no más de 200 caracteres.'
    ],
    'price' => 'Por favor, ingrese el precio de venta.'
];

$validation_messages = [
    'name' => [
        'required' => true,
        'maxlength' => 200
    ],
    'address' => [
        'required' => false,
    ]
];

// AJAX ONLY
$get_one_route = 'sale.get_one';
$update_modal_fields = [
    [ 'inputName' => 'name' ],
    [ 'inputName' => 'price' ]
];

@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3">
        <label class="col-form-label">Price:</label>
        <input type="text" class="form-control" id="autocomplete_search" name="price">
    </div>
    <div id="map" style="height: 450px;width: 100%;"></div>

    <style>
        .pac-container {
            z-index: 10000 !important;
        }

    </style>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell" style="width: 15%;">Precio</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Configuración interna</li>
    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
@endsection

@push('scripts-extra')
    <script>
        
    </script>
@endpush
