@extends('admin.characteristics.template_list')

@php
$nombre_crud = 'Sucursal';
$add_action_route = 'add_branch';
$update_action_route = 'update_branch';
$delete_action_route = 'delete_branch';

$collection_of_items = $branches;

$list_columns = 'admin.characteristics.branch.branch_columns';
$modal_edit_contents = 'admin.characteristics.branch.branch_edit';
$export_columns = '[0, 1, 2, 3]';

@endphp

@section('modal_create_contents')

<div class="mb-3">
    <label class="col-form-label">Nombre:</label>
    <input type="text" class="form-control" name="name" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Dirección:</label>
    <input type="text" class="form-control" id="autocomplete_search" name="address" required>
</div>
<div class="mb-3">
    <input class="form-control" hidden name="longitude" id="longitude" required>
</div>
<div class="mb-3">
    <input class="form-control" hidden  name="latitude" id="latitude"  required>
</div>
<div id="map" style="height: 500px;width: 100%;"></div>

<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
@endsection

@section('label_headers')
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell" style="width: 30%;">Dirección</th>
    <th class="d-none d-sm-table-cell" style="width: 15%;">Longitud</th>
    <th class="d-none d-sm-table-cell" style="width: 15%;">Latitud</th>
@endsection

