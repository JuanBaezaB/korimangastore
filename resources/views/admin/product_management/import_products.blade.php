@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Importar Productos</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item" aria-current="page">Productos</li>
                        <li class="breadcrumb-item" aria-current="page">Gestion de Producto</li>
                        <li class="breadcrumb-item active" aria-current="page">Importar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Modal con spinner de carga -->
    <div id="upload-modal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered text-center" style="z-index: 200;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Importar</h5>
                </div>
                <div class="modal-body">
                    <div class="spinner-border" role="status">
                        <span class="sr-only"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="lead">
                        Procesando planilla excel, por favor espere mientras se cargan los productos
                    </p>
                </div>
            </div>
        </div>
        <div class="black-fade"
            style="background: black; top: 0; left: 0; position: absolute; width: 100%; height: 100%; opacity: 0.4; z-index: 100;">
        </div>
    </div>


    <!-- Page Content -->
    <div class="content">
        <!-- Elements -->
        <div class="block block-rounded shadow-sm">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ 'Importar' }}</h3>
            </div>
            <div class="block-content block-content-full">
                <h2 class="content-heading pt-0">Manga</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Ingresa productos tipo manga de manera más rápida importándolos de un archivo Excel(.xlsx).
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <form id="form-manga" class="" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Importar productos tipo manga:</label>
                                <input id="input-manga" type="file" class="form-control" name="file" value=""
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                            </div>
                            <div>
                                <button class="btn btn-success mr-3"
                                    onclick="window.location='{{ asset('media/excel-import/Plantilla - Importar mangas.xlsx') }}'">Descarga
                                    planilla tipo</button>
                            </div>
                            <div>
                                <small>Importante! Esta plantilla contiene datos de ejemplo. Si desea ingresar nuevos,
                                    borrelos antes de ingresarlos.</small>
                            </div>
                        </form>

                    </div>
                </div>

                <h2 class="content-heading pt-0">Figura</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Ingresa productos de tipo figura de manera más rápida importándolos de un archivo Excel(.xlsx).
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <form id="form-figure" class="" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Importar productos tipo figura:</label>
                                <input id="input-figure" type="file" class="form-control" name="file" value=""
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                            </div>
                            <div>
                                <button class="btn btn-success mr-3"
                                    onclick="window.location='{{ asset('media/excel-import/Plantilla - Importar figuras.xlsx') }}'">Descarga
                                    planilla tipo</button>
                            </div>
                            <div>
                                <small>Importante! Esta plantilla contiene datos de ejemplo. Si desea ingresar nuevos,
                                    borrelos antes de ingresarlos.</small>
                            </div>
                        </form>

                    </div>
                </div>

                <h2 class="content-heading pt-0">Producto generico</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            Ingresa productos genéricos de manera más rápida importándolos de un archivo Excel(.xlsx).
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5 overflow-hidden">
                        <form id="form-product" class="" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Importar productos genericos:</label>
                                <input id="input-product" type="file" class="form-control" name="file" value=""
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                            </div>
                            <div>
                                <button class="btn btn-success mr-3"
                                    onclick="window.location='{{ asset('media/excel-import/Plantilla - Importar productos.xlsx') }}'">Descarga
                                    planilla tipo</button>
                            </div>
                            <div>
                                <small>Importante! Esta plantilla contiene datos de ejemplo. Si desea ingresar nuevos,
                                    borrelos antes de ingresarlos.</small>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Elements -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script>
        $('#input-product').change(function() {
            $('#form-product').submit();
        });
        $('#input-manga').change(function() {
            $('#form-manga').submit();
        });
        $('#input-figure').change(function() {
            $('#form-figure').submit();
        });
    </script>
    <!-- js sweetalert2 -->
    <script>
        let toast = Swal.mixin({
            buttonsStyling: false,
            target: '#page-container',
            customClass: {
                confirmButton: 'btn btn-success m-1',
                cancelButton: 'btn btn-danger m-1',
                input: 'form-control'
            }
        });

        $(document).ready(function(e) {
            $('#upload-modal').hide();

            $('#form-manga').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: "{{ route('product.mangaimport') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#upload-modal').show();
                    },
                    success: (data) => {
                        console.log('Response->', data);
                        toast.fire({
                            title: "Planilla cargada exitosamente",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                        }).then(function() {
                            //'/dashboard/programa/cardiovascular/listaPacientes'
                            window.location.href = (
                                "{{ route('product.list') }}");
                        });
                        //this.reset();
                    },
                    error: function(response) {
                        response = response.responseJSON;
                        console.log(response);
                        var $div = $('<div class="d-none alert alert-danger"><ul></ul></div>');
                        var $ul = $div.find('ul');
                        var errors = response.errors;

                        errors.forEach(function(suberrors) {
                            suberrors = suberrors[0];
                            var $li = $('<li>');
                            $li.text(suberrors);
                            $ul.append($li);
                        });
                        toast.fire({
                            title: "¡Error! Hubo un problema al subir planilla.",
                            icon: "error",
                            html: $div.html()
                        });

                        console.log(response);
                        console.log("Fallo la importacion");
                    },
                    complete: function() {
                        $('#upload-modal').hide();
                    }
                });
            });


            $('#form-figure').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('product.figureimport') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#upload-modal').show();
                    },
                    success: (data) => {
                        console.log('Response->', data);
                        toast.fire({
                            title: "Planilla cargada exitosamente",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                        }).then(function() {
                            //'/dashboard/programa/cardiovascular/listaPacientes'
                            window.location.href = (
                                "{{ route('product.list') }}");
                        });
                        //this.reset();
                    },
                    error: function(response) {
                        response = response.responseJSON;
                        console.log(response);
                        var $div = $('<div class="d-none alert alert-danger"><ul></ul></div>');
                        var $ul = $div.find('ul');
                        var errors = response.errors;

                        errors.forEach(function(suberrors) {
                            suberrors = suberrors[0];
                            var $li = $('<li>');
                            $li.text(suberrors);
                            $ul.append($li);
                        });
                        toast.fire({
                            title: "¡Error! Hubo un problema al subir planilla.",
                            icon: "error",
                            html: $div.html()
                        });

                        console.log(response);
                        console.log("Fallo la importacion");
                    },
                    complete: function() {
                        $('#upload-modal').hide();
                    }
                });
            });

            $('#form-product').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('product.genericimport') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#upload-modal').show();
                    },
                    success: (data) => {
                        console.log('Response->', data);
                        toast.fire({
                            title: "Planilla cargada exitosamente",
                            icon: "success",
                            confirmButtonText: "Aceptar",
                        }).then(function() {
                            //'/dashboard/programa/cardiovascular/listaPacientes'
                            window.location.href = (
                                "{{ route('product.list') }}");
                        });
                        //this.reset();
                    },
                    error: function(response) {
                        response = response.responseJSON;
                        console.log(response);
                        var $div = $('<div class="d-none alert alert-danger"><ul></ul></div>');
                        var $ul = $div.find('ul');
                        var errors = response.errors;

                        errors.forEach(function(suberrors) {
                            suberrors = suberrors[0];
                            var $li = $('<li>');
                            $li.text(suberrors);
                            $ul.append($li);
                        });
                        toast.fire({
                            title: "¡Error! Hubo un problema al subir planilla.",
                            icon: "error",
                            html: $div.html()
                        });

                        console.log(response);
                        console.log("Fallo la importacion");
                    },
                    complete: function() {
                        $('#upload-modal').hide();
                    }
                });
            });
        });
    </script>
@endsection
