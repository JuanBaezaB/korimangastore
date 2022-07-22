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
    <textarea class="form-control" name="description">{{ $an_item->description }}</textarea>
</div>
<div class="mb-3">
    <label class="col-form-label">Respuesta:</label>
    <textarea class="form-control" name="answer">{{ $an_item->answer }}</textarea>
</div>
<div class="mb-3 form-check form-switch">
    <label class="col-form-label" for="flexSwitchCheckDefault">Deshabilitar/Habilitar</label>
    <input class="form-check-input make-switch" name="status" type="checkbox" role="switch" value="{{$an_item->status}}" id="flexSwitchCheckDefault" {{ $an_item->status == "Visible" ? 'checked' : ''}}>
</div>
