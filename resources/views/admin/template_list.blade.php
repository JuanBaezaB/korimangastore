@extends('layouts.backend')

<?php /*

Defined in this file:
Variables:
- nombre_crud
- collection_of_items
- add_action_route
- update_action_route
- delete_action_route
- export_columns
- validation_rules
- validation_messages
Sections:
- breadcrumb
- label_headers
- modal_create_contents
Stacks:
- scripts-extra

*/ ?>
@section('title') {{$nombre_crud}} @endsection

@section('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js\plugins/datatables-responsive/css/responsive.bootstrap5.min.css') }}">
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Listado {{ mb_strtolower($nombre_crud) }}</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @yield('breadcrumb')
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
                <h3 class="block-title">{{ $nombre_crud }}</h3>
                <div class="block-options">
                    <buttonb {{ request()->is('gestion-base/gestion-usuarios/permisos') ? ' hidden' : '' }} class="btn btn-sm btn-alt-secondary btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_item" data-bs-whatever="@mdo">
                        <i class="fa fa-fw fa fa-plus"></i> Ingresar {{ mb_strtolower($nombre_crud) }}
                    </button>
                </div>
            </div>

            <div class="block-content block-content-full">
                @if ($errors->any())
                    <ul>
                        <div id="ERROR_COPY" style="display: none" class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} <br></li>
                            @endforeach
                        </div>
                    </ul>
                    <br />
                @endif

                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table id="product-table" class="table table-bordered table-striped table-vcenter table-hover w-100 display">
                    <thead>
                        <tr>
                            <!-- <th class="text-center" style="width: 80px;">#</th> -->
                            @yield('label_headers')
                            <th {{ request()->is('gestion-base/gestion-usuarios/permisos') ? ' hidden' : '' }} style="width: 10%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection_of_items as $an_item)
                            <tr>
                                <!-- <td class="text-center">{{ $an_item->id }}</td> -->
                                @include($list_columns, ['an_item' => $an_item])
                                <td {{ request()->is('gestion-base/gestion-usuarios/permisos') ? ' hidden' : '' }} class="">
                                    <form class=" delete" action="{{ route($delete_action_route, $an_item->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        <div class=" btn-group">
                                            @hasSection('update-modal')
                                            <button type="button" class="btn btn-sm btn-outline-primary x-edit-button"
                                                data-bs-toggle="modal" data-bs-target="#update_item"
                                                data-bs-whatever="@mdo" title="Actualizar"
                                                x-data-id="{{ $an_item->id }}">
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                            @endif
                                            @sectionMissing('update-modal')
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#update_item{{ $an_item->id }}"
                                                data-bs-whatever="@mdo" title="Actualizar">
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                            @endif

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="tooltip" title="Eliminar">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </button>

                                        </div>
                                    </form>

                                    @sectionMissing('update-modal')
                                    <!-- Modal Actualizar-->
                                    <div class="modal fade modal-update" id="update_item{{ $an_item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-slideleft">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title " id="exampleModalLabel">Actualizar {{ strtolower($nombre_crud) }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="validation-update" action="{{ route($update_action_route, $an_item->id) }}"
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        @include($modal_edit_contents, ['an_item' => $an_item])
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
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
    <div class="modal fade " id="add_item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-slideleft">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Ingresar {{ strtolower($nombre_crud) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="validation-add" action="{{ route($add_action_route) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @yield('modal_create_contents')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    @yield('update-modal')
    @hasSection('update-modal')
    <!-- Modal Actualizar-->
    <div class="modal fade modal-update" id="update_item" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-slideleft">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Actualizar {{ strtolower($nombre_crud) }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update" class="validation-update" action="{{ route($update_action_route, ':id') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include($modal_edit_contents)
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    @endif
@endsection

@section('js_after')
    <!-- Datatable -->
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
            let export_columns = {{ Js::from($export_columns) }};
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
                            columns: export_columns
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger mb-2',
                        exportOptions: {
                            columns: export_columns
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i style="color:white" class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-warning mb-2',
                        exportOptions: {
                            columns: export_columns
                        }
                    }
                ]
            });
        });
    </script>
    <!-- End Datatable -->

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


    <!-- End js sweetalert2 -->

    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('js/plugins/select2/js/select2.full.js') }}"></script>


    <script>
        jQuery(document).ready(function($) {
            $('.force-js-select2').each(function() {
                $(this).select2({
                    dropdownParent: $(this).closest('div.modal')
                });
            });
        });
    </script>

    @stack('scripts-extra')

    <script>
        jQuery(document).ready(function($) {
            var validation_rules = {{ Js::from($validation_rules) }} ;
            var validation_messages = {{ Js::from($validation_messages) }} ;
            $('.validation-add, .validation-update')
            .each(function () {
                $(this).validate({
                    ignore: [],
                    rules: validation_rules,
                    messages: validation_messages,
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
            });

            $('.js-select2').on('change', e => {
                $(e.currentTarget).valid();
            });
        });
    </script>

@endsection
