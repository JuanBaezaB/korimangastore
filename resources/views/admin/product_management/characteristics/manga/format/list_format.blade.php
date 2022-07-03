@extends('admin.template_list_no_ajax')

@php
$nombre_crud = 'Formato'; // nombre con inicial en mayuscula del producto
$add_action_route = 'format.add'; // ruta para accion de agregar
$update_action_route = 'format.update'; // ruta para accion de actualizar
$delete_action_route = 'format.delete'; // ruta para accion de eliminar

/*
        Se saca de controller, el argumento a compact()
    */
$collection_of_items = $formats;

// nombre de vista *_columns
$list_columns = 'admin.product_management.characteristics.manga.format.format_columns';
// nombre de serie *_serie
$modal_edit_contents = 'admin.product_management.characteristics.manga.format.format_edit';
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
        <label class="col-form-label">Descripción (opcional):</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="simplemde-add" name="description" required>
    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell">Descripción</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Gestión de productos</li>
    <li class="breadcrumb-item">Caracteristicas</li>
    <li class="breadcrumb-item">Manga</li>
    <li class="breadcrumb-item active" aria-current="page">Formato</li>
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

