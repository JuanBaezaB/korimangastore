@extends('admin.characteristics.template_list')

@php
$nombre_crud = 'Persona creativa'; // nombre con inicial en mayuscula del producto
$add_action_route = 'add_creative_person'; // ruta para accion de agregar
$update_action_route = 'update_creative_person'; // ruta para accion de actualizar
$delete_action_route = 'delete_creative_person'; // ruta para accion de eliminar


/*
    Se saca de controller, el argumento a compact()
*/
$collection_of_items = $creative_people;

// nombre de vista *_columns
$list_columns = 'admin.characteristics.creative_person.creative_person_columns';
// nombre de serie *_serie
$modal_edit_contents = 'admin.characteristics.creative_person.creative_person_edit';
$export_columns = '[0]';

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

