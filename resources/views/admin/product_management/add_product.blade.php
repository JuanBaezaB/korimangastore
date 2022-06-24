@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Añadir Producto</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item active" aria-current="page">Productos</li>
                        <li class="breadcrumb-item active" aria-current="page">Gestion de Producto</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        @if ($errors->any())
            <div id="ERROR_COPY" style="display: none" class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }} <br></li>
                @endforeach
            </div>
        @endif
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ empty($is_edit) ? 'Añadir' : 'Editar'}}</h3>
            </div>
            <div class="block-content">
                <form class="validation" action="{{ !empty($is_edit) ? route('product.update', $product->id) : route('product.add') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if (!empty($is_edit))
                        @method('PATCH')
                    @endif
                    <div class="mb-3">
                        <label class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="name" value="{{ isset($product) ? $product->name : '' }}" required>
                    </div>
                    <input type="hidden" name="status" value="{{ isset($product->status) ? $product->status : 'Habilitado' }}">
                    <div class="mb-3">
                        <label class="col-form-label">Precio:</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                $
                            </span>
                            <input type="number" class="form-control" name="price" min="0" placeholder="0" value="{{ isset($product) ? $product->price : '' }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Proveedor:</label>

                        <select class="js-basic-single js-select2 form-select" name="provider_id" style="width: 100%;" data-placeholder="Elige uno si aplica..">
                            <option></option>
                            @foreach ($providers as $row)
                                <option value="{{ $row->id }}" {{ (isset($product->provider) && ($product->provider->id === $row->id)) ? 'selected=selected' : '' }}>{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Series:</label>

                        <select class="js-basic-multiple js-select2 form-select" multiple="multiple" name="series[]" style="width: 100%;" data-placeholder="Elige varias..">
                            <option></option>
                            @foreach ($series as $row)
                                <option value="{{ $row->id }}" {{ (isset($product->series) && ($product->series->contains($row->id))) ? 'selected=selected' : '' }}>{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>



                    <div class="mb-3">
                        <label class="col-form-label">Tipo de producto:</label>

                        <select id="product-type-select" name="category_id" class="js-basic-single js-select2 js-category form-control form-select" style="width: 100%;" data-placeholder="Elige uno.." required>
                            <option></option>
                            @foreach ($categories as $row)
                            <option value="{{ $row->id }}" {{ (isset($product->category) && ($product->category->id === $row->id)) ? 'selected=selected' : '' }}>{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <!-- FORM MANGA -->
                    <div class="mb-3 manga-form">
                        <label class="col-form-label">Editorial:</label>

                        <select class="js-basic-single js-select2 form-select manga-required" name="editorial_id" style="width: 100%;" data-placeholder="Elige uno..">
                            <option></option>
                            @foreach ($publishers as $row)
                                <option value="{{ $row->id }}"
                                {{ (isset($product->productable->editorial->id) && $product->productable->editorial->id === $row->id) ? 'selected=selected' : '' }}>
                                    {{ $row->name }} - {{ $row->origin }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3 manga-form">
                        <label class="col-form-label">Formato:</label>

                        <select class="js-basic-single js-select2 form-select manga-required" name="format_id" style="width: 100%;" data-placeholder="Elige uno..">
                            <option></option>
                            @foreach ($formats as $row)
                                <option value="{{ $row->id }}"
                                {{ (isset($product->productable->format->id) && $product->productable->format->id === $row->id) ? 'selected=selected' : '' }}>
                                {{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3 manga-form">
                        <label class="col-form-label">Genero:</label>

                        <select class="js-basic-multiple js-select2 form-select" multiple="multiple" name="genres[]" style="width: 100%;" data-placeholder="Elige varias..">
                            <option></option>
                            @foreach ($genres as $row)
                                <option value="{{ $row->id }}"
                                {{ (isset($product->productable->genres) && $product->productable->genres->contains($row->id)) ? 'selected=selected' : '' }}>
                                    {{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3 row manga-form">
                        <div class="col">
                            <label class="col-form-label">Arte por:</label>

                            <select class="js-basic-multiple js-select2 form-select" multiple="multiple" name="arts[]"  data-placeholder="Elige varios..">
                                <option></option>
                                @foreach ($creatives as $row)
                                    <option value="{{ $row->id }}"
                                    {{ (isset($product->productable) && $product->category->name === 'Manga' && $product->productable->creativePeople()->wherePivotIn('creative_type', ['both', 'art'])->find($row->id)) ? 'selected=selected' : '' }}>
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col">
                            <label class="col-form-label">Historia por:</label>

                            <select class="js-basic-multiple js-select2 form-select" multiple="multiple" name="stories[]"  data-placeholder="Elige varios..">
                                <option></option>
                                @foreach ($creatives as $row)
                                    <option value="{{ $row->id }}"
                                    {{ (isset($product->productable) && $product->category->name === 'Manga' && $product->productable->creativePeople()->wherePivotIn('creative_type', ['both', 'story'])->find($row->id)) ? 'selected=selected' : '' }}>
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <!-- END FORM MANGA -->

                    <!-- FORM FIGURE -->

                    <div class="mb-3 figure-form">
                        <label class="col-form-label">Tipo:</label>

                        <select class="js-basic-single js-select2 form-select figure-required" name="figure_type_id" style="width: 100%;" data-placeholder="Elige uno..">
                            <option></option>
                            @foreach ($figure_types as $row)
                                <option value="{{ $row->id }}"
                                {{ (isset($product->productable->type->id) && $product->productable->type->id === $row->id) ? 'selected=selected' : '' }}>
                                {{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <!-- END FORM FIGURE -->

                    <div class="mb-3">
                        <!-- SimpleMDE Container -->
                        <label class="col-form-label">Descripción:</label>
                        <textarea class="js-simplemde" id="simplemde" name="description">{{ isset($product) ? $product->description : '' }}</textarea>
                    </div>

                    <div class="mb-3 text-end" >
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">{{ empty($is_edit) ? 'Añadir' : 'Actualizar'}}</button>
                    </div>
                </form>



            </div>


        </div>
        <!-- END Elements -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
<!-- editor MDE -->
<script src="{{ asset('js/plugins/simplemde/simplemde.min.js') }}"></script>
<script>
    var simplemde = new SimpleMDE({
        /*
            Desabilitado algunas partes del toolbar,
            side-by-side y fullscreen estan bugueados
        */
        toolbar: ['bold', 'italic', 'heading', '|', 'quote', 'unordered-list', 'ordered-list', 'preview'],
        spellChecker: false
    });
</script>

<!-- jQuery (required for Select2 + jQuery Validation plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>



<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/select2/js/select2.full.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

<!-- select2-->
<script>
    jQuery(document).ready(function($) {
        $(document).ready(function() {
            $('.js-basic-multiple').select2({});
            $('.js-basic-single').select2();
        });
    });
</script>

<!-- esconde partes de formulario que no se usan y cambia elementos required dinamicamente -->
<script>

    jQuery(document).ready(function($) {
        let es_to_en = {
            figura: 'figure'
        };
        let es2en = (x) => (x in es_to_en) ? es_to_en[x] : x;
        function hideFormsBut(value) {
            value = es2en(value);
            let formsAround = ['manga', 'generic', 'figure'];
            if (formsAround.indexOf(value) == -1) {
                value = 'generic';
            }
            let toHide = formsAround.filter(v => v !== value).map(v => `.${v}-form`).join(', ');
            $(toHide).addClass('d-none');
            $(`.${value}-form`).removeClass('d-none');
        }

        function toggleRequired(value) {
            value = es2en(value);
            let formsAround = ['manga', 'figure'];
            let toRemoveRequired = formsAround.filter(v => v !== value).map(v => `.${v}-required`).join(', ');
            if (toRemoveRequired !== '') {
                $(toRemoveRequired).prop('required', false);
            }
            $(`.${value}-required`).prop('required', true);
        }

        $('#product-type-select').on('change', function() {
            let value = $(this).find(':selected').text().toLowerCase();
            hideFormsBut(value);
        });

        $(document).ready(function() {
            let value = $('#product-type-select').find(':selected').text().toLowerCase();
            hideFormsBut(value);
        });
    });


</script>
<script>
    jQuery('.validation').validate({
        ignore: [],
        rules: {
            'name': {
                required: true,
                maxlength: 200
            },
            'price': {
                required: true,
                maxlength: 200
            }

        },
        messages: {
            'name': {
                required: 'Por favor, ingrese un nombre para el producto.',
                maxlength: 'Por favor, ingrese no más de 200 caracteres.'
            },
            'price': {
                required: 'Por favor, ingrese un precio.',
                maxlength: 'Por favor, ingrese no más de 200 caracteres.'
            },
            'category_id': {
                required: 'Por favor, seleccione un tipo de producto.',
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
    $('.js-category').on('change', e => {
        $(e.currentTarget).valid();
    });
</script>

@if ($errors->any())
<script>
    Swal.fire({
        title: 'Error',
        text: "No podrás revertir esto!",
        icon: 'error',
        html:jQuery("#ERROR_COPY").html(),
        showCloseButton: true,
    });
</script>
@endif



@endsection

@section('css_after')
<link rel="stylesheet" href="{{ asset('js/plugins/simplemde/simplemde.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">

<style>
</style>

@endsection
