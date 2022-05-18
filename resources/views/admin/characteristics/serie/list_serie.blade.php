@extends('admin.characteristics.template_list')

@php
$nombre_crud = 'Serie';
$add_action_route = 'add_serie';
$update_action_route = 'update_serie';
$delete_action_route = 'delete_serie';

$collection_of_items = $series;

$list_columns = 'admin.characteristics.serie.serie_columns';
$modal_edit_contents = 'admin.characteristics.serie.serie_edit';

@endphp

@section('modal_create_contents')

<div class="mb-3">
    <label class="col-form-label">Nombre:</label>
    <input type="text" class="form-control" name="name" required>
</div>
@endsection

@section('label_headers')
    <th>Nombre</th>
@endsection

