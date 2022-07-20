<div class="mb-3">
    <label class="col-form-label">Correo Electrónico:</label>
    <input type="text" class="form-control" name="email"
        value="{{ $an_item->email }}" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Asunto:</label>
    <input type="text" class="form-control" name="title"
        value="{{ $an_item->title }}" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Descripción:</label>
    <textarea class="js-simplemde simplemde-update form-control" id="simplemde-update{{$an_item->id}}"  name="description">{{ $an_item->description }}</textarea>
</div>
<div class="mb-3">
    <label class="col-form-label">Respuesta:</label>
    <textarea class="js-simplemde simplemde-update form-control" id="simplemde-update{{$an_item->id}}"  name="answer">{{ $an_item->answer }}</textarea>
</div>
