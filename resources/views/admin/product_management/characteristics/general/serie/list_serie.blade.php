@extends('admin.template_list')

@php
$nombre_crud = 'Serie'; // nombre con inicial en mayuscula del producto
$add_action_route = 'serie.add'; // ruta para accion de agregar
$update_action_route = 'serie.update'; // ruta para accion de actualizar
$delete_action_route = 'serie.delete'; // ruta para accion de eliminar

/*
    Se saca de controller, el argumento a compact()
*/
$collection_of_items = $series;

// nombre de vista *_columns
$list_columns = 'admin.product_management.characteristics.general.serie.serie_columns';
// nombre de serie *_serie
$modal_edit_contents = 'admin.product_management.characteristics.general.serie.serie_edit';
$export_columns = [0, 1];

@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control" name="name" required>
    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Caracteristicas</li>
    <li class="breadcrumb-item">General</li>
    <li class="breadcrumb-item active" aria-current="page">Serie</li>
@endsection

@push('scripts-extra')
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
                    required: 'Por favor, ingrese un nombre.',
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
        jQuery(document).ready(function($) {
            $('.modal-update').each(function() {
                let s = $(this).find('.validation-update');
                s.validate({
                    ignore: [],
                    rules: {
                        'name': {
                            required: true,
                            maxlength: 200
                        }
                    },
                    messages: {
                        'name': {
                            required: 'Por favor, ingrese un nombre.',
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
            });
        });
    </script>
@endpush
