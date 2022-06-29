@extends('layouts.backend')

@section('title')
    {{ 'Listado producto' }}
@endsection

@section('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js\plugins/datatables-responsive/css/responsive.bootstrap5.min.css') }}">
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Listado productos</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Productos</li>
                        <li class="breadcrumb-item active" aria-current="page">Gestion de Productos</li>
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
                <h3 class="block-title">Productos</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table id="product-table" class="table table-bordered table-striped table-vcenter table-hover w-100 display nowrap">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Tipo</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Precio</th>
                            <th style="width: 10%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="fw-semibold">
                                {{ $product->name }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $product->category->name }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                $ {{ $product->price }}
                            </td>
                            <td class="">
                                    <form class=" delete" action="{{ route('product.delete', $product->id) }}"
                                        method="POST">
                                        <div class=" btn-group">
                                            <a type="button" class="btn btn-sm btn btn-outline-primary" href="{{ route('product.edit', $product->id) }}" title="Actualizar">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn btn-outline-danger"
                                                data-bs-toggle="tooltip" title="Eliminar">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </button>

                                        </div>
                                    </form>
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
@endsection

@section('js_after')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/responsive.bootstrap5.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#product-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
                dom: 'Bfrtip',
                responsive: true,
                    columnDefs: [
                        { responsivePriority: 1, targets: 0 },
                        { responsivePriority: 2, targets: -1 }
                    ],
                buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    className:'btn  btn-success mb-2',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    className:'btn btn-danger mb-2',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'print',
                    text: '<i style="color:white" class="fas fa-print"></i>',
                    titleAttr: 'Imprimir',
                    className:'btn btn-warning mb-2',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }
            ]
            });
        });
    </script>


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
        $('.delete').submit(function(e) {
            e.preventDefault();

            toast.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-danger m-1',
                    cancelButton: 'btn btn-secondary m-1'
                },
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, eliminar!',
                html: false,
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
        @if (session('success') == 'created')
            toast.fire(
                'Ingresado!',
                'El ingreso se ha relizado exitosamente.',
                'success'
            );

        @endif
        @if (session('success') == 'deleted')

            toast.fire(
                'Eliminado!',
                'El registro ha sido eliminado.',
                'success'
            );
        @endif
        @if (session('success') == 'updated')
            toast.fire(
                'Actualizado!',
                'El registro ha sido actualizado.',
                'success'
            );
        @endif
   </script>
@endsection
