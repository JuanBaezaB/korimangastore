@extends('admin.characteristics.template_list')

@php
$nombre_crud = 'Sucursal';
$add_action_route = 'add_branch';
$update_action_route = 'update_branch';
$delete_action_route = 'delete_branch';

$collection_of_items = $branches;

$list_columns = 'admin.characteristics.branch.branch_columns';
$modal_edit_contents = 'admin.characteristics.branch.branch_edit';
$export_columns = '[0, 1, 2, 3]';

@endphp

@section('modal_create_contents')

<div class="mb-3">
    <label class="col-form-label">Nombre:</label>
    <input type="text" class="form-control" name="name" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Dirección:</label>
    <input type="text" class="form-control" id="autocomplete_search" name="address" required>
</div>
<div class="mb-3">
    <input class="form-control" hidden name="longitude" id="longitude" required>
</div>
<div class="mb-3">
    <input class="form-control" hidden  name="latitude" id="latitude"  required>
</div>
<div id="map" style="height: 500px;width: 100%;"></div>

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
@endpush

