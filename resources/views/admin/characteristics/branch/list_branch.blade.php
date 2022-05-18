@extends('admin.characteristics.template_list')

@php
$nombre_crud = 'Sucursal';
$add_action_route = 'add_branch';
$update_action_route = 'update_branch';
$delete_action_route = 'delete_branch';

$collection_of_items = $branches;

$list_columns = 'admin.characteristics.branch.branch_columns';
$modal_edit_contents = 'admin.characteristics.branch.branch_edit';

@endphp

@section('modal_create_contents')

<div class="mb-3">
    <label class="col-form-label">Nombre:</label>
    <input type="text" class="form-control" name="name" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Dirección:</label>
    <input type="text" class="form-control" id="address" name="address" required>
</div>
<div class="mb-3">
    <label for="message-text" class="col-form-label">Longitud:</label>
    <input class="form-control" step="any" type="number" name="longitude" required>
</div>
<div class="mb-3">
    <label for="message-text" class="col-form-label">Latitud:</label>
    <input class="form-control" step="0.0000001" type="number" name="latitude" required>
</div>
@endsection

@section('label_headers')
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell" style="width: 30%;">Dirección</th>
    <th class="d-none d-sm-table-cell" style="width: 15%;">Longitud</th>
    <th class="d-none d-sm-table-cell" style="width: 15%;">Latitud</th>
@endsection

