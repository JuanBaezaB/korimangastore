@extends('layouts.backend')

@section('title')
    {{ 'Listado ventas' }}
@endsection

@section('css_after')
    <meta name="the_branch" content="{{ isset($the_branch->id) ? $the_branch->id : '' }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Listado ventas</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Área de Ventas</li>
                        <li class="breadcrumb-item " aria-current="page">Ventas</li>
                        <li class="breadcrumb-item active">Listado</li>
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
                <div class="block-options">
                    <a class="btn btn-sm btn-alt-secondary btn-primary" href="{{ route('sale.create') }}">
                        <i class="fa fa-fw fa fa-plus"></i> Realizar venta
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="row items-push">
                    <h5>Seleccione una sucursal</h5>
                    <div class="d-flex flex-column col-sm-8 pb-3 flex-sm-row justify-content-sm-start align-items-sm-center">
                        <div class="mx-sm-2 flex-grow-1">
                            <x-branch-select
                            :redirect-template="URL::route('sale.list', ['sucursal' => 'id'])"
                            :redirect="route('sale.list')"
                            :current="app('request')->input('sucursal', -1)"
                            :allBranches="true"
                            id="change-branch-select" style="width: 100%;" />
                        </div>
                    </div>
                </div>

                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table id="the-table" class="table table-bordered table-striped table-vcenter table-hover w-100 display nowrap">
                    <thead>
                        <tr>
                            <th style="">#</th>
                            <th style="">Sucursal</th>
                            <th style="">Cuando</th>
                            <th class="" style="">Vendedor</th>
                            <th class="" style="">n° Productos</th>
                            <th class="" style="">Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
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

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/select2/js/select2.full.js') }}"></script>

    @if (session('success') == 'created')
        <script>
            Swal.fire(
                'Ingresado!',
                'El ingreso se ha relizado exitosamente.',
                'success'
            )
        </script>
    @endif

    @if (session('success') == 'deleted')
        <script>
            Swal.fire(
                'Eliminado!',
                'El registro ha sido eliminado.',
                'success'
            )
        </script>
    @endif

    @if (session('success') == 'updated')
        <script>
            Swal.fire(
                'Actualizado!',
                'El registro ha sido actualizado.',
                'success'
            )
        </script>
    @endif
@endsection

@push('js_after_stack')
<script>
    $(document).ready(function() {
        let the_branch_id = $('#change-branch-select').val();
        let maybe_id = (the_branch_id) ? {id: the_branch_id} : {};

        let datatable = $('#the-table').DataTable({
            ajax: {
                url: '{{ route("sale.data_table") }}',
                type: "POST",
                data: function (d) {
                    return $.extend({}, d, maybe_id, {
                        _token: $('meta[name=csrf-token]').prop('content')
                    });
                }
            },
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            },
            columns: [
                { data: 'id' },
                { data: 'branch.name' },
                { data: 'created_at' },
                { data: 'user.name' },
                { data: 'products_count' },
                { data: 'total_price' },

            ],
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
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className:'btn btn-danger mb-2',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i>',
                titleAttr: 'Imprimir',
                className:'btn btn-warning mb-2',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }
        ]
        });


    });
</script>
@endpush
