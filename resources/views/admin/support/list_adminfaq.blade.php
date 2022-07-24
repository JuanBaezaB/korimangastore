@extends('admin.template_list_ajax')

@php
$nombre_crud = 'Consultas';
$add_action_route = 'user-question-pub';
$update_action_route = 'user-questions.update';
$delete_action_route = 'user-questions.delete';

$collection_of_items = $questions;

$list_columns = 'admin.support.adminfaq_columns';
$modal_edit_contents = 'admin.support.adminfaq_edit';
$export_columns = [0, 1, 2];

$validation_rules = [
    'email' => [
        'required' => true,
        'maxlength' => 50,
    ],
    'title' => [
        'required' => true,
        'maxlength' => 100,
    ],
    'description' => [
        'required' => false,
        'maxlength' => 500,
    ],
    'answer' => [
        'required' => false,
        'maxlength' => 500,
    ],
];

$validation_messages = [
    'email' => [
        'required' => 'Por favor, ingrese un correo electrónico.',
        'maxlength' => 'Por favor, ingrese un correo electrónico de máximo 50 caracteres.',
    ],
    'title' => [
        'required' => 'Por favor, ingrese un asunto.',
        'maxlength' => 'Por favor, ingrese un asunto de máximo 100 caracteres.',
    ],
    'description' => [
        'maxlength' => 'Por favor, ingrese una descripción de máximo 500 caracteres.',
    ],
    'answer' => [
        'maxlength' => 'Por favor, ingrese una respuesta de de máximo 500 caracteres.',
    ],
];

// AJAX ONLY
$get_one_route = 'user-questions.get_one';
$update_modal_fields = [
    [ 'inputName' => 'email' ],
    [ 'inputName' => 'title' ],
    [ 'inputName' => 'description', 'type' => 'simplemde' ],
    [ 'inputName' => 'status', 'inputDataKey' => 'statusBoolean' ],
    [ 'inputName' => 'answer', 'type' => 'simplemde' ]
];

@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Correo Electrónico:</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Asunto:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label ">Descripción:</label>
        <textarea class="js-simplemde form-control @error('description') is-invalid @enderror" id="simplemde-add"
            id="description" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label class="col-form-label ">Respuesta:</label>
        <textarea class="js-simplemde form-control @error('answer') is-invalid @enderror" id="simplemde-answer-add"
            id="answer" name="answer"></textarea>
    </div>
@endsection

@section('label_headers')
    <th class="text-center" style="width: 80px;">#</th>
    <th>Email</th>
    <th>Asunto</th>
    <th class="d-sm-table-cell">Descripción</th>
    <th class="d-sm-table-cell">Respuesta</th>
    <th class="d-none d-sm-table-cell">Estado</th>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Área de Soporte</li>
    <li class="breadcrumb-item">Soporte</li>
    <li class="breadcrumb-item active" aria-current="page">Administar Preguntas Frecuentes (FAQ's)</li>
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
        var simplemde = new SimpleMDE({
            element: document.getElementById("simplemde-answer-add"),
            /*
                Desabilitado algunas partes del toolbar,
                side-by-side y fullscreen estan bugueados
            */
            toolbar: ['bold', 'italic', 'heading', '|', 'quote', 'unordered-list', 'ordered-list', 'preview'],
            spellChecker: false
        });
    </script>

    <script>
        $(".make-switch").change(function() {
            if ($(this).prop('checked') == true) {
                document.getElementById("flexSwitchCheckDefault").value = "Visible";
                console.log(document.getElementById("flexSwitchCheckDefault").value);
            } else {
                document.getElementById("flexSwitchCheckDefault").value = "Invisible";
                console.log(document.getElementById("flexSwitchCheckDefault").value);
            }
        });
    </script>
@endpush
