@extends('layouts.backend')

@section('title')
    {{ 'Añadir stock' }}
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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Agregar Stock</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Gestión de inventario</li>
                        <li class="breadcrumb-item">Stock</li>
                        <li class="breadcrumb-item active">Añadir stock</li>
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

                </div>
            </div>

            <div class="block-content block-content-full">
                <div class="row items-push">
                    <div class="col-lg-8 col-md-6">
                        <div class="">
                            <h5>Seleccione una sucursal</h5>
                            <select id="change-branch-select" class="js-select2 form-select" style="width: 100%;" autocomplete="off" data-placeholder="Elige una sucursal..." >
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ (isset($the_branch->id) && $the_branch->id==$branch->id) ? 'selected' : '' }}>{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="">
                            <h5>Seleccione un producto</h5>
                            <x-product-search id="select-product" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="row">
                            <h5>Ingrese una cantidad</h5>
                            <div class="col-sm-6">
                                <div class="mb-3"><input type="number" id="qnt-product-stock" class="form-control" min="1" value="1" autocomplete="off" /></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-success" id="btn-add-stock"><i class="fa fa-plus"></i></a>
                                        <a class="btn btn-danger" id="btn-remove-stock"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table id="product-table" class="table table-bordered table-striped table-vcenter table-hover w-100 display nowrap">
                    <thead>
                        <tr>
                            <th style="width: 9%">Unidades</th>
                            <th style="width: 50%">Sucursal</th>
                            <th style="width: 50%">Nombre</th>
                            <th class="d-none d-sm-table-cell" style="width: 40%;">Tipo</th>
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
            jQuery(function ($) {
                $(document).ready(function () {
                    $('#change-branch-select').select2();
                });
            });
        </script>

        <script>
            jQuery(function ($) {

                function addRow(data) {
                    var $tbody = $('#product-table tbody');
                    var $el = $('<tr>'
                            + '<td></td><td></td><td></td><td></td><td>'
                            + '<a type="submit" class="btn btn-sm btn btn-outline-danger" data-bs-toggle="tooltip" title="Revertir" >'
                            + '<i class="fa fa-fw fa-rotate-left"></i>'
                            + '</a>'
                            +'</td></tr>');
                    $tbody.prepend($el);
                    $el.find('a').on('click', function() {
                        var d = $.extend({}, data);
                        d.reverse = true;
                        d.noReset = true;
                        window.queryAddStock(1, d);
                    });
                    var order = [
                        'quantity',
                        'branch.name',
                        'product.name',
                        'product.category.name',
                        null
                    ];
                    //console.log(data);
                    for (var i = 0; i < order.length; ++i) {
                        var colKey = order[i];
                        if (colKey) {
                            var $child = $el.children(':nth-child(' + (i + 1) + ')');
                            $child.text(U.dot(data, colKey));
                        }
                    }
                    
                }

                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                        }
                    });
                    /**
                     * 
                    */
                    function queryAddStock(sign=1, opts={}) {
                        sign = sign || 1;

                        var $qnt = $('#qnt-product-stock');
                        var qnt = opts.qnt || $qnt.val() * sign;
                        var branch_id = opts.branch_id || $('#change-branch-select').val();
                        var product_id = opts.product_id || $('#select-product').val();

                        var data = {
                            quantity: qnt,
                            branch_id: branch_id,
                            product_id: product_id,
                            reverse: opts.reverse,
                            _token: $('meta[name=csrf-token]').attr('content')
                        };
                        $.ajax({
                            url: '{{ route("stock.add") }}',
                            dataType: 'json',
                            method: 'POST',
                            data: data
                        })
                        .done(function (data) {
                            addRow(data);

                            if (!opts.noReset) {
                                $qnt.val(1);
                            }
                        })
                        .fail(function (jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);
                            document.write(jqXHR.responseText);
                            alert(textStatus + ' ' + errorThrown);
                        });

                    }

                    window.queryAddStock = queryAddStock;

                    $('#btn-add-stock').click(function () {
                        queryAddStock();
                    });
                    $('#btn-remove-stock').click(function () {
                        queryAddStock(-1);
                    });
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
