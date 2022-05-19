@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Producto</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Añadir</li>
                        <li class="breadcrumb-item active" aria-current="page">Producto</li>
                        <li class="breadcrumb-item active" aria-current="page">Gestión de productos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Añadir</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('add_product') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <input type="hidden" name="status" value="Habilitado">
                    <div class="mb-3">
                        <label class="col-form-label">Precio:</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                $
                            </span>
                            <input type="number" class="form-control" name="price" min="0" placeholder="0" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Proveedor:</label>

                        <select class="js-basic-single js-select2 form-select" name="provider_id" style="width: 100%;" data-placeholder="Elige uno.." required>
                            <option></option>
                            @foreach ($providers as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Series:</label>

                        <select class="js-basic-multiple js-select2 form-select" multiple="multiple" name="series[]" style="width: 100%;" data-placeholder="Elige varias.." required>
                            <option></option>
                            @foreach ($series as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    

                    <div class="mb-3">
                        <label class="col-form-label">Tipo de producto:</label>

                        <select id="product-type-select" name="product_type" class="js-basic-single js-select2 form-select" style="width: 100%;" data-placeholder="Elige uno.." required>
                            <option></option>
                            @foreach ($categories as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3 manga-form">
                        <label class="col-form-label">Editorial:</label>

                        <select class="js-basic-single js-select2 form-select" name="editorial_id" style="width: 100%;" data-placeholder="Elige uno.." required>
                            <option></option>
                            @foreach ($publishers as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3 manga-form">
                        <label class="col-form-label">Formato:</label>

                        <select class="js-basic-single js-select2 form-select" name="format_id" style="width: 100%;" data-placeholder="Elige uno.." required>
                            <option></option>
                            @foreach ($formats as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3 manga-form">
                        <label class="col-form-label">Genero:</label>

                        <select class="js-basic-multiple js-select2 form-select" multiple="multiple" name="genres[]" style="width: 100%;" data-placeholder="Elige varias.." required>
                            <option></option>
                            @foreach ($genres as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="row manga-form">
                        <div class="mb-3 col">
                            <label class="col-form-label">Arte por:</label>

                            <select class="js-basic-multiple js-select2 form-select" multiple="multiple" name="arts[]"  data-placeholder="Elige varios.." required>
                                <option></option>
                                @foreach ($creatives as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3 col">
                            <label class="col-form-label">Historia por:</label>

                            <select class="js-basic-multiple js-select2 form-select" multiple="multiple" name="stories[]"  data-placeholder="Elige varios.." required>
                                <option></option>
                                @foreach ($creatives as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>





                    <div class="mb-3">
                        <!-- SimpleMDE Container -->
                        <label class="col-form-label">Descripción:</label>
                        <textarea class="js-simplemde" id="simplemde" name="description"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
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


<!-- esconde partes de formulario que no se usan -->
<script>
    $('#product-type-select').on('change', function() {
        let value = $(this).find(':selected').text().toLowerCase();
        let formsAround = ['manga', 'generic'];
        if (formsAround.indexOf(value) == -1) {
            value = 'generic';
        }
        let toHide = formsAround.filter(v => v !== value).map(v => `.${v}-form`).join(', ');
        $(`.${value}-form`).show();
        $(toHide).hide();
    });
</script>

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



@endsection

@section('css_after')
<link rel="stylesheet" href="{{ asset('js/plugins/simplemde/simplemde.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">

<style>
</style>

@endsection