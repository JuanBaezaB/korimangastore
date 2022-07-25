@extends('layouts.backend')

@section('title')
    {{ 'Listado stock' }}
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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Listado stock</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Gestión de inventario</li>
                        <li class="breadcrumb-item">Stock</li>
                        <li class="breadcrumb-item active" aria-current="page">Listado</li>
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
                    <a class="btn btn-sm btn-alt-secondary btn-primary" href="{{ route('stock.create') }}">
                        <i class="fa fa-fw fa fa-plus"></i> Añadir nuevo
                    </a>

                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="row items-push">
                    <h5>Seleccione una sucursal</h5>
                    <div class="d-flex flex-column col-sm-8 pb-3 flex-sm-row justify-content-sm-start align-items-sm-center">

                        <div class="mx-sm-2 flex-grow-1">
                            <select id="change-branch-select" class="js-select2 form-select" style="width: 100%;" autocomplete="off">
                                <option value="" {{ ($is_all_branches) ? 'selected' : '' }}>Todos</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ (!$is_all_branches && $the_branch->id==$branch->id) ? 'selected' : '' }}>{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table id="product-table" class="table table-bordered table-striped table-vcenter table-hover w-100 display nowrap">
                    <thead>
                        <tr>
                            <th style="width: 9%">Unidades</th>
                            <th style="width: 50%">Nombre</th>
                            <th class="" style="width: 40%;">Tipo</th>
                            <th class="" style="width: 15%;">Precio</th>
                            <th style="width: 10%;">Acciones</th>
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

    <script>
        $(document).ready(function() {
            let the_branch_id = $('meta[name=the_branch]').prop('content');
            let maybe_id = (the_branch_id) ? {id: the_branch_id} : {};

            let firstColumn;
            if (!the_branch_id) {
                firstColumn = {
                    data: null,
                    render: null,
                    className: 'dt-control',
                    defaultContent: '',
                    searchable: null,
                    orderable: null
                };
            } else {
                firstColumn = {
                    data: 'branches.0.pivot.stock'
                };
            }

            let datatable = $('#product-table').DataTable({
                ajax: {
                    url: '{{ route("stock.data_table") }}',
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
                    firstColumn,
                    { data: 'name' },
                    { data: 'category.name' },
                    { data: 'price' },
                    {
                        data: null,
                        searchable: null,
                        orderable: null,
                        render: function (data, type, row, meta) {
                            let actionUrl = "{{ route('product.delete', ':id') }}".replace(':id', row.id);
                            let editUrl = "{{ route('product.edit', ':id') }}".replace(':id', row.id);
                            return '<form class=" delete" action="'+ actionUrl +'"method="POST">'
                            + '<div class=" btn-group">'
                            + '<a type="button" class="btn btn-sm btn btn-outline-primary" href="'
                            + editUrl + '" title="Actualizar">'
                            + '<i class="fa fa-pencil-alt"></i>'
                            + '</a>'
                            + '@csrf'
                            + '@method("DELETE")'
                            + '<button type="submit" class="btn btn-sm btn btn-outline-danger" data-bs-toggle="tooltip" title="Eliminar">'
                            + '<i class="fa fa-fw fa-trash"></i>'
                            + '</button></div></form>';
                        }
                    }
                ],
                dom: 'Bfrtip',
                responsive: true,
                    columnDefs: [
                        { responsivePriority: 1, targets: 1 },
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
                    text: '<i class="fas fa-print"></i>',
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

        @empty($the_branch)
            <script>
                // basado en https://datatables.net/examples/api/row_details.html
                function formatCollap(d) {
                    let rows = d.branches.map( function (branch) {
                        return '<tr><td>' + branch.name + '</td><td>' + branch.pivot.stock + '</td></tr>';
                    });
                    let total_stock = d.branches_sum_branch_productstock || 0;
                    return (
                        '<table cellpaddding="5" cellspacing="0" border="0" style="padding-left:50px;" >' +
                        '<tbody>' +
                        '<tr><td>Total</td><td>' + total_stock + '</td></tr>' +
                        rows.join(' ') +
                        '</tbody></table>'
                    );
                }

                jQuery(function($) {
                    $(document).ready(function() {
                        let table = $('#product-table').DataTable();
                        $('#product-table tbody').on('click', 'td.dt-control', function () {
                            let $tr = $(this).closest('tr');
                            let row = table.row($tr);

                            if (row.child.isShown()) {
                                row.child.hide();
                                $tr.removeClass('shown');
                            } else {
                                row.child(formatCollap(row.data())).show();
                                $tr.addClass('shown');
                            }
                        });
                    });
                });
            </script>
        @endempty

        <script>
            $('#change-branch-select').on('change', function() {
                let url = '{{ route("stock.get_one", ":id") }}';
                let allUrl = '{{ route("stock.list") }}';
                let newId = this.value;
                if (newId !== "") {
                    location.href = url.replace(':id', newId);
                } else {
                    location.href = allUrl;
                }
            });

            jQuery(function ($) {
                $(document).ready(function () {
                    $('#change-branch-select').select2();
                });
            });
        </script>
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
