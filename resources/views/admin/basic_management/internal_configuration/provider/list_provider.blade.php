@extends('admin.template_list')

@php
$nombre_crud = 'Proveedor';
$add_action_route = 'provider.add';
$update_action_route = 'provider.update';
$delete_action_route = 'provider.delete';

$collection_of_items = $providers;

$list_columns = 'admin.basic_management.internal_configuration.provider.provider_columns';
$modal_edit_contents = 'admin.basic_management.internal_configuration.provider.provider_edit';
$export_columns = [0, 1, 2];

@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Descripción (opcional):</label>
        <input type="text" class="form-control" id="description" name="description" required>
    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell">Descripción</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Configuración interna</li>
    <li class="breadcrumb-item active" aria-current="page">Proveedor</li>
@endsection

@push('scripts-extra')
    <script>
        jQuery('.validation-add').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                    maxlength: 200
                },
                'description': {
                    required: false,
                    maxlength: 2000
                },

            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.'
                },
                'description': {
                    maxlength: 'Por favor, ingrese no más de 2000 caracteres.'
                },
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
                },
                'description': {
                    required: false,
                    maxlength: 2000
                },

            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre para la sucursal.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.'
                },
                'description': {
                    maxlength: 'Por favor, ingrese no más de 2000 caracteres.'
                },
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
