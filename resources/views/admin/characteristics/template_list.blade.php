@extends('layouts.backend')

@section('css_after')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Listado {{ strtolower($nombre_crud) }}</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">

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
                    <button class="btn btn-sm btn-alt-secondary btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_item" data-bs-whatever="@mdo">
                        <i class="fa fa-fw fa fa-plus"></i> Ingresar {{ $nombre_crud }}
                    </button>
                </div>
            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table id="product-table" class="table table-bordered table-striped table-vcenter table-hover w-100 display nowrap">
                    <thead>
                        <tr>
                            <!-- <th class="text-center" style="width: 80px;">#</th> -->
                            @yield('label_headers')
                            <th style="width: 10%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection_of_items as $an_item)
                            <tr>
                                <!-- <td class="text-center">{{ $an_item->id }}</td> -->
                                @include($list_columns, ['an_item' => $an_item])
                                <td class="">
                                    <form class=" delete" action="{{ route($delete_action_route, $an_item->id) }}"
                                        method="POST">
                                        <div class=" btn-group">
                                            <button type="button" class="btn btn-sm btn btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#update_item{{ $an_item->id }}"
                                                data-bs-whatever="@mdo" title="Actualizar">
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
                                    <!-- Modal Actualizar-->
                                    <div class="modal fade " id="update_item{{ $an_item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title " id="exampleModalLabel">Actualizar {{ strtolower($nombre_crud) }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route($update_action_route, $an_item->id) }}"
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        @include($modal_edit_contents, ['an_item' => $an_item])
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                                        </div>
                                                       
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Ingresar {{ strtolower($nombre_crud) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route($add_action_route) }}" enctype="multipart/form-data" method="POST">
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
                            columns: {{ $export_columns }}
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger mb-2',
                        exportOptions: {
                            columns: {{ $export_columns }}
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-warning mb-2',
                        exportOptions: {
                            columns: {{ $export_columns }}
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
    <!-- End js sweetalert2 -->


    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJo0d84q3_W-zY6-m9_QJGa1UTY_vn2es&libraries=places"></script>

    <script>
        google.maps.event.addDomListener(window, 'load', initialize);


        const coordinates = { lat: -36.6287785, lng: -72.0984874 }

        function initialize() {
            var myOptions = {
                zoom: 15,
                center: new google.maps.LatLng(-36.6287785, -72.0984874),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            var map = new google.maps.Map(document.getElementById("map"), myOptions);

            const marker = new google.maps.Marker({
                animation: google.maps.Animation.DROP,
                position: coordinates,
                map: map,
                draggable: false
            });
            marker.addListener("click", toggleBounce);
            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
                
            };

            var information = new google.maps.InfoWindow();

            var input = document.getElementById('autocomplete_search');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                // place variable will have all the information you are looking for.
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
                if (!place.geometry.viewport) {
                    window.alert("Error al mostrar el lugar");
                }
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = "";
                if(place.address_components){
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name  || " "),
                        (place.address_components[1] && place.address_components[1].short_name  || " "),
                        (place.address_components[2] && place.address_components[2].short_name  || " ")
                    ];
                }
                console.log(place.name);
                information.setContent('<div><strong>'+place.name+'</strong><br>'+address+'</div>');
                information.open(map, marker);
            });
        }

    </script>
@endsection
