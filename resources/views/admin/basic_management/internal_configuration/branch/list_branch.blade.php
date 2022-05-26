@extends('admin.basic_management.internal_configuration.template_list')

@php
$nombre_crud = 'Sucursal';
$add_action_route = 'add_branch';
$update_action_route = 'update_branch';
$delete_action_route = 'delete_branch';

$collection_of_items = $branches;

$list_columns = 'admin.basic_management.internal_configuration.branch.branch_columns';
$modal_edit_contents = 'admin.basic_management.internal_configuration.branch.branch_edit';
$export_columns = [0, 1, 2, 3];

@endphp

@section('modal_create_contents')
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control" name="name" placeholder="Kori-concepción">
    </div>
    <div class="mb-3">
        <label class="col-form-label">Dirección (opcional):</label>
        <input type="text" class="form-control" id="autocomplete_search" name="address">
    </div>
    <div class="mb-3">
        <input class="form-control" hidden name="longitude" id="longitude">
    </div>
    <div class="mb-3">
        <input class="form-control" hidden name="latitude" id="latitude">
    </div>
    <div id="map" style="height: 450px;width: 100%;"></div>

    <style>
        .pac-container {
            z-index: 10000 !important;
        }

    </style>
@endsection

@section('label_headers')
    <th>Nombre</th>
    <th class="d-none d-sm-table-cell" style="width: 30%;">Dirección</th>
    <th class="d-none d-sm-table-cell" style="width: 15%;">Longitud</th>
    <th class="d-none d-sm-table-cell" style="width: 15%;">Latitud</th>
@endsection

@push('scripts-extra')
    <!-- ingresar mapa -->
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJo0d84q3_W-zY6-m9_QJGa1UTY_vn2es&libraries=places"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        const coordinates = {
            lat: -36.82618294457036,
            lng: -73.05284952925507
        }

        function initialize() {

            
            var myOptions = {
                zoom: 17,
                center: new google.maps.LatLng(-36.82618294457036, -73.05284952925507),
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
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry || !place.geometry.location) {
                    
                    window.alert("No hay detalles disponibles para la entrada: '" + place.name + "'");
                    return;
                }
                
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
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || " "),
                        (place.address_components[1] && place.address_components[1].short_name || " "),
                        (place.address_components[2] && place.address_components[2].short_name || " ")
                    ];
                }
                console.log(place.name);
                information.setContent('<div><strong>' + place.name + '</strong><br>' + address + '</div>');
                information.open(map, marker);
            });
        }
    </script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize_update);
    
        var lati = Number(document.querySelector("#latitude_update").value);
        var lng = Number(document.querySelector("#longitude_update").value);
    
        const coordinates2 = {lat: lati, lng: lng }
    
        function initialize_update() {
            var myOptions = {
                zoom: 15,
                center: new google.maps.LatLng(lati, lng),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            var map_update = new google.maps.Map(document.getElementById("map_update"), myOptions);
    
            const marker = new google.maps.Marker({
                animation: google.maps.Animation.DROP,
                position: coordinates2,
                map: map_update,
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
    
            var input = document.getElementById('address_update');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                // place variable will have all the information you are looking for.
                $('#latitude_update').val(place.geometry['location'].lat());
                $('#longitude_update').val(place.geometry['location'].lng());
                if (!place.geometry.viewport) {
                    window.alert("Error al mostrar el lugar");
                }
                if (place.geometry.viewport) {
                    map_update.fitBounds(place.geometry.viewport);
                } else {
                    map_update.setCenter(place.geometry.location);
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
                information.open(map_update, marker);
            });
        }
    
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
                    maxlength: 200
                },
                'address': {
                    required: false,
                },

            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre para la sucursal.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.'
                },
                'address': 'Por favor, ingrese una dirección.',
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

    <script>
        jQuery('.validation-update').validate({
            ignore: [],
            rules: {
                'name': {
                    required: true,
                    maxlength: 200
                },
                'address': {
                    required: true,
                },

            },
            messages: {
                'name': {
                    required: 'Por favor, ingrese un nombre para la sucursal.',
                    maxlength: 'Por favor, ingrese no más de 200 caracteres.'
                },
                'address': 'Por favor, ingrese una dirección.',
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
@endpush
