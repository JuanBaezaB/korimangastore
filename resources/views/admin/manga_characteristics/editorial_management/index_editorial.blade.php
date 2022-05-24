@extends('layouts.backend')

@section('css_after')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection

@section('content')
<div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Listado Editoriales</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Caracteristicas Manga</li>
                        <li class="breadcrumb-item active" aria-current="page">Gestion de Editoriales</li>
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
            <h3 class="block-title">Editorial</h3>
            <div class="block-options">
                <button class="btn btn-sm btn-alt-secondary btn-primary" data-bs-toggle="modal" data-bs-target="#add_editorial" data-bs-whatever="@mdo">
                    <i class="fa fa-fw fa fa-plus"></i> Ingresar Editorial
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table id="product-table" class="table table-bordered table-striped table-vcenter table-hover w-100 display nowrap">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th>Nombre</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Origen</th>
                        <th style="width: 10%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($editorials as $editorial)
                    <tr>
                        <td class="text-center">{{ $editorial->id }}</td>
                        <td class="fw-semibold">{{ $editorial->name }}</td>
                        <td class="d-none d-sm-table-cell">{{ $editorial->origin }}</td>
                        <td class="">
                            <form class=" delete" action="{{ route('delete_editorial', $editorial->id) }}" method="POST">
                                <div class=" btn-group">
                                    <button type="button" class="btn btn-sm btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#update_editorial{{ $editorial->id }}" data-bs-whatever="@mdo" title="Actualizar">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn btn-outline-danger" data-bs-toggle="tooltip" title="Eliminar">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </button>

                                </div>
                            </form>

                            <!-- Modal Actualizar-->
                            <div class="modal fade " id="update_editorial{{ $editorial->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalLabel">Actualizar Editorial</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('update_editorial', $editorial->id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                {{ method_field('PATCH') }}

                                                <div class="mb-3">
                                                    <label class="col-form-label">Nombre:</label>
                                                    <input type="text" class="form-control" name="name" value="{{$editorial->name}}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label">Origen:</label>
                                                    <input type="text" class="form-control" id="origin" name="origin" value="{{$editorial->origin}}" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            
        </div>
    </div>
    <!-- END Elements -->
</div>
<!-- END Page Content -->
<!-- Modal Ingresar-->
<div class="modal fade " id="add_editorial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Ingresar Editorial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add_editorial') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Origen:</label>
                        <select class="js-basic-single js-select2 form-select" id="origin" name="origin" style="width: 100%;" data-placeholder="Choose one..">
                            <option></option>
                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            <option value="Argentina">Argentina</option>
                            <option value="Mexico">Mexico</option>
                            <option value="España">España</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_after')
<!-- Datatable -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#product-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            },
            dom: 'Bfrtip',
            responsive: true,
            columnDefs: [{
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: -1
                }
            ],
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn  btn-success mb-2',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger mb-2',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i>',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-warning mb-2',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }
            ]
        });
    });
</script>
<!-- End Datatable -->

<!-- js sweetalert2 -->
<script>
    $('.delete').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                /*
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )*/
                this.submit();
            }
        })

    });
</script>

@if (session('success') == 'Editorial created successfully')
<script>
    Swal.fire(
        'Ingresado!',
        'El ingreso se ha relizado exitosamente.',
        'success'
    )
</script>
@endif

@if (session('success') == 'Editorial deleted successfully')
<script>
    Swal.fire(
        'Eliminado!',
        'El registro ha sido eliminado.',
        'success'
    )
</script>
@endif

@if (session('success') == 'Editorial updated successfully')
<script>
    Swal.fire(
        'Actualizado!',
        'El registro ha sido actualizado.',
        'success'
    )
</script>
@endif
<!-- jQuery (required for Select2 + jQuery Validation plugins) -->


<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/select2/js/select2.full.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

<!-- select2-->
<script>
    jQuery(document).ready(function($) {
        $(document).ready(function() {
            $('.js-basic-multiple').select2({});
            $('.js-basic-single').select2({
                dropdownParent: $("#add_editorial")
            });
        });
    });
</script>
@endsection