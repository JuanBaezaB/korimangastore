
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control"  name="name" value="{{$an_item->name}}" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Dirección:</label>
        <input type="text" class="form-control" id="address_update"
            name="address"  value="{{$an_item->address}}">
    </div>
    <div class="mb-3">
        <label for="message-text"
            class="col-form-label">Longitud:</label>
        <input class="form-control" id="longitude_update" step="any" type="number"
            name="longitude"  value="{{$an_item->longitude}}">
    </div>
    <div class="mb-3">
        <label for="message-text"
            class="col-form-label">Latitud:</label>
        <input class="form-control latitude" id="latitude_update" step="any" type="number"
            name="latitude"  value="{{$an_item->latitude}}">
    </div>
    <div id="map_update" class="mt-2" style="height: 100px;width: 100%;"></div>

    <!-- End Modal -->