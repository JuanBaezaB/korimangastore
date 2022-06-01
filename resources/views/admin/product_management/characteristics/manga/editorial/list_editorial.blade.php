@extends('admin.template_list')

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
@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Origen:</label>
        <select class="js-select-add js-select2 form-select" id="origin" name="origin" style="width: 100%;" data-placeholder="Choose one..">
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

@push('scripts-extra')
<script src="{{ asset('js/plugins/select2/js/select2.full.js') }}"></script>

<!-- select2-->
<script>
    jQuery(document).ready(function($) {
        $(document).ready(function() {
            $('.js-select-add').select2({
                dropdownParent: $("#add_item")
            });
        });
    });
</script>
    
@endpush
