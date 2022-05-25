@extends('admin.product_management.characteristics.general.template_list')

@php
$nombre_crud = 'Serie'; // nombre con inicial en mayuscula del producto
$add_action_route = 'add_serie'; // ruta para accion de agregar
$update_action_route = 'update_serie'; // ruta para accion de actualizar
$delete_action_route = 'delete_serie'; // ruta para accion de eliminar


/*
    Se saca de controller, el argumento a compact()
*/
$collection_of_items = $series;

// nombre de vista *_columns
$list_columns = 'admin.product_management.characteristics.general.serie.serie_columns';
// nombre de serie *_serie
$modal_edit_contents = 'admin.product_management.characteristics.general.serie.serie_edit';
$export_columns = [0];

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

