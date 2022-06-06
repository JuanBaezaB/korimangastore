<div class="mb-3">
    <label class="col-form-label">Nombre:</label>
    <input type="text" class="form-control" name="name"
        value="{{ $an_item->name }}" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Descrición (opcional):</label>
    <input type="text" class="form-control" id="descrition"
        name="description" value=""
        required>
</div>
<textarea class="js-simplemde simplemde-update form-control" id="simplemde-update{{$an_item->id}}"  name="description" required>{{ $an_item->description }}</textarea>