
    <div class="mb-3">
        <label class="col-form-label">Nombre:</label>
        <input type="text" class="form-control" name="name" value="{{$an_item->name}}" required>
    </div>
    <div class="mb-3">
        <label class="col-form-label">Dirección:</label>
        <input type="text" class="form-control" id="address"
            name="address"  value="{{$an_item->address}}" required>
    </div>
    <div class="mb-3">
        <label for="message-text"
            class="col-form-label">Longitud:</label>
        <input class="form-control" step="any" type="number"
            name="longitude"  value="{{$an_item->longitude}}" required>
    </div>
    <div class="mb-3">
        <label for="message-text"
            class="col-form-label">Latitud:</label>
        <input class="form-control" step="0.0000001" type="number"
            name="latitude"  value="{{$an_item->latitude}}" required>
    </div>

    <!-- End Modal -->