@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Importar Productos</h1>
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
        <!-- Elements -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ 'Importar' }}</h3>
            </div>
            <div class="block-content">
                @if ($errors->any())
                    <ul>
                        <div id="ERROR_COPY" style="display: none" class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li >{{ $error }} <br></li>
                            @endforeach
                        </div>
                    </ul>
                    <br />
                @endif
                <div class="row">
                    <div class="col-12">
                        <form id="form-product" class="" action="{{ route('product.genericimport') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="col-form-label">Importar productos genericos:</label>
                                <input id="input-product" type="file" class="form-control" name="file" value="" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <form id="form-manga" class="" action="{{ route('product.mangaimport') }}" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="col-form-label">Importar mangas:</label>
                                <input id="input-manga" type="file" class="form-control" name="file" value="" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <form id="form-figure" class="" action="{{ route('product.figureimport') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="col-form-label">Importar figuras:</label>
                                <input id="input-figure" type="file" class="form-control" name="file" value="" required>
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
    <script src="{{asset('js/lib/jquery.min.js')}}"></script>
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

        @if ($errors->any())
            toast.fire({
                title: 'Error',
                text: "No podrás revertir esto!",
                icon: 'error',
                html:jQuery("#ERROR_COPY").html(),
                showCloseButton: true,
            });
        @endif
    </script>

@endsection
