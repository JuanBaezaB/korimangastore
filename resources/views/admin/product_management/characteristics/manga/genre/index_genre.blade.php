@extends('layouts.backend')

@section('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Listado Generos</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Caracteristicas</li>
                        <li class="breadcrumb-item">Manga</li>
                        <li class="breadcrumb-item active" aria-current="page">Géstion de Generos</li>
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
                <h3 class="block-title">Genero</h3>
                <div class="block-options">
                    <button class="btn btn-sm btn-alt-secondary btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_genre" data-bs-whatever="@mdo">
                        <i class="fa fa-fw fa fa-plus"></i> Ingresar Genero
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table id="product-table"
                    class="table table-bordered table-striped table-vcenter table-hover w-100 display">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Nombre</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Tipo</th>
                            <th style="width: 10%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                            <tr>
                                <td class="text-center">{{ $genre->id }}</td>
                                <td class="fw-semibold">{{ $genre->name }}</td>
                                <td class="d-none d-sm-table-cell">{{ $genre->type }}</td>
                                <td class="">
                                    <form class=" delete" action="{{ route('delete_genre', $genre->id) }}"
                                        method="POST">
                                        <div class=" btn-group">
                                            <button type="button" 
                                                class="btn btn-sm btn btn-outline-primary x-edit-button" 
                                                x-data-id="{{ $genre->id }}" title="Actualizar"
                                                data-bs-toggle="modal" data-bs-target="#update_genre"
                                                data-bs-whatever="@mdo">
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>

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
    <!-- Modal Ingresar-->
    <div class="modal fade " id="add_genre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Ingresar Genero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_genre') }}" class="validation-add" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Tipo:</label>
                            <!-- Necesitamos el tipo de acuerdo a datos suministrados por el Cliente Korimangastore -->
                            <select class="select-add form-select" name="type" style="width: 100%;"
                                data-placeholder="Elige uno...">
                                <option></option>
                                <option value="Demografía">Demografía</option>
                                <option value="Temático">Tematico</option>
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

    <!-- Modal Editar -->
    <div class="modal fade modal-update" id="update_genre" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Actualizar Genero</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update"
                        action="{{ route('update_genre', ':id') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="mb-3">
                            <label class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="name"
                                value="" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Tipo:</label>
                            <select class="select-update form-select" name="type"
                                style="width: 100%;" data-placeholder="Elige uno...">
                                <option></option>
                                <option value="Demografía">Demografía</option>
                                <option value="Temático">Tematico</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit"
                                id="btn-update"
                                class="btn btn-primary">Actualizar</button>
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
                        text: '<i style="color: white" class="fas fa-print"></i>',
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
    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->


    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/select2/js/select2.full.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

    <!-- modal -->
    <script>
        jQuery(document).ready(function ($) {
            let $updateModal = $('#update_genre');
            function updateEditModal(data) {
                $updateModal.prop('x-data-id', data.id);
                $updateModal.find('[name=name]').val(data.name);
                $updateModal.find('[name=type]').val(data.type).trigger('change');
            }

            $('.x-edit-button').on('click', function () {
                let $this = $(this);
                let id = $this.attr('x-data-id');
                let url = {{ Js::from(route('get_one_genre')) }};
                $.ajax(url, {
                    dataType: 'json',
                    contentType: 'application/json',
                    method: 'POST',
                    data: JSON.stringify({
                        'id': id,
                        '_token': '{{ csrf_token() }}'
                    })
                })
                .done(updateEditModal)

                // TODO make better error handling
                .fail(x => console.log(x));
            });

            $('#form-update').submit(function (e, from) {
                if (from == null) {
                    let $this = $(this);
                    let id = $updateModal.prop('x-data-id');
                    let actionUrl = $this.attr('action').replace(':id', id);
                    $this.attr('action', actionUrl);
                    e.preventDefault();
                    $this.trigger('submit', ['submit function']);
                } else {
                }
            });
        });
    </script>

    <!-- select2-->
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.modal-update').each(function() {
                    let s = $(this).find('.select-update');
                    s.select2({
                        dropdownParent: $(this)
                    });
                });

                $('.select-add').select2({
                    dropdownParent: $('#add_genre')
                });



            });
        });
    </script>


    <!-- validaciones -->
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script>
        jQuery('.validation-add').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                    maxlength: 100
                },
                'type': {
                    required: true,
                },

            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre.',
                    maxlength: 'Por favor, ingrese no más de 100 caracteres.'
                },
                'type': {
                    required: 'Por favor, selecciona uno.',
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
        jQuery('.select-add').on('change', e => {
            jQuery(e.currentTarget).valid();
        });
    </script>
    <script>
        jQuery('.validation-update').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                    maxlength: 200
                },
                'description': {
                    required: false,
                    maxlength: 2000
                },

            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre para la sucursal.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.'
                },
                'description': {
                    maxlength: 'Por favor, ingrese no más de 2000 caracteres.'
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
    </script>
@endsection
