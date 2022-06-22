
<div class="mb-3">
    <label class="col-form-label">Nombre:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$an_item->name}}" required>
</div>
