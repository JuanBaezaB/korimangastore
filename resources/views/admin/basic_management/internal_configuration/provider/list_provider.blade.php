@extends('admin.template_list_no_ajax')

@php
$nombre_crud = 'Proveedor';
$add_action_route = 'provider.add';
$update_action_route = 'provider.update';
$delete_action_route = 'provider.delete';

$collection_of_items = $providers;

$list_columns = 'admin.basic_management.internal_configuration.provider.provider_columns';
$modal_edit_contents = 'admin.basic_management.internal_configuration.provider.provider_edit';
$export_columns = [0, 1, 2];

$validation_rules = [
    'name' => [
        'required' => true,
        'maxlength' => 200
    ],
    'description' => [
        'required' => false,
        'maxlength' => 2000
    ]
];

$validation_messages = [
    'name' => [
        'required' => 'Por favor, ingrese un nombre.',
        'maxlength' => 'Por favor, ingrese no más de 200 caracteres.'
    ],
    'description' => [
        'maxlength' => 'Por favor, ingrese no más de 2000 caracteres.'
    ]
];

@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label ">Descripción (opcional):</label>
        <textarea class="js-simplemde form-control @error('description') is-invalid @enderror" id="simplemde-add" id="description" name="description" required></textarea>
    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell">Descripción</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Gestión base</li>
    <li class="breadcrumb-item">Configuración interna</li>
    <li class="breadcrumb-item active" aria-current="page">Proveedor</li>
@endsection

@push('scripts-extra')
    <script src="{{ asset('js/plugins/simplemde/simplemde.min.js') }}"></script>
    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("simplemde-add"),
            /*
                Desabilitado algunas partes del toolbar,
                side-by-side y fullscreen estan bugueados
            */
            toolbar: ['bold', 'italic', 'heading', '|', 'quote', 'unordered-list', 'ordered-list', 'preview'],
            spellChecker: false
        });
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('.modal-update').each(function () {
                var text = $(this).find('.simplemde-update').text();
                console.log(text);
                var simplemdeupdate = new SimpleMDE({
                    element: $(this).find('.simplemde-update').get(0),

                    toolbar: ['bold', 'italic', 'heading', '|', 'quote', 'unordered-list', 'ordered-list', 'preview'],
                    spellChecker: false,
                });
                simplemdeupdate.value(text);
                simplemdeupdate.render();
                $(this).focus(function(){
                    simplemdeupdate.codemirror.refresh();
                });

            });
        });
    </script>
@endpush
