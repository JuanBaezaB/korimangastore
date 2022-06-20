@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br />
@endif
<div class="mb-3">
    <label class="col-form-label">Nombre:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $an_item->name }}" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Email:</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ $an_item->email }}" name="email" required>
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
