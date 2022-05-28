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

@push('scripts-extra')
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script>
        jQuery('.validation-add').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                    maxlength: 200
                }
            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre para la sucursal.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.'
                }
            },
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: "span",
            errorPlacement: function(error, element) {
                // Add the `csc-helper-text` class to the error element
                error.addClass("is-invalid invalid-feedback animated fadeIn");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            }
        });
    </script>

    <script>
        jQuery('.validation-update').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                    maxlength: 200
                }
            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre para la sucursal.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.'
                }
            },
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: "span",
            errorPlacement: function(error, element) {
                // Add the `csc-helper-text` class to the error element
                error.addClass("is-invalid invalid-feedback animated fadeIn");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            }
        });
    </script>
@endpush
