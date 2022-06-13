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
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$an_item->name}}" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Roles:</label>
        @foreach ($permissions as $permission)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]" {{ $an_item->getPermissionNames()->contains($permission->name) ? 'checked' : '' }}>
                <label class="form-check-label" for="">{{ $permission->name }}</label>
            </div>
        @endforeach
</div>
