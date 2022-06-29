<div class="mb-3">
    <label class="col-form-label">Nombre:</label>
    <input type="text" class="form-control " name="name" value="{{ $an_item->name }}" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Email:</label>
    <input type="email" class="form-control "
        value="{{ $an_item->email }}" name="email" required>
</div>
<div class="mb-3">
    <label class="col-form-label" >Tu imagen:</label>
    <div class="push">
        @if ($an_item->image != null)
            <img class="img-avatar img-avatar75" src="{{ asset('storage/'.$an_item->image) }}">
        @endif
        @if ($an_item->image == null)
            <img class="img-avatar img-avatar75" src="{{ url('media/avatars/avatar0.jpg') }}">
        @endif
    </div>
</div>
<div class="mb-3">
    <label class="col-form-label" >Imagen:</label>
    <input type="file" class="form-control" name="image"  accept="image/png, image/jpeg, image/jpg, image/svg">
    <div  class="form-text">Rellene este campo solo en el caso de querer editar la imagen, en caso contrario, no lo haga.</div>
</div>

<div class="mb-3">
    <label class="col-form-label">Roles:</label>
    @foreach ($roles as $rol)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $rol->id }}" name="roles[]"
                {{ $an_item->getRoleNames()->contains($rol->name) ? 'checked' : '' }}>
            <label class="form-check-label" for="">{{ $rol->name }}</label>
        </div>
    @endforeach

</div>
