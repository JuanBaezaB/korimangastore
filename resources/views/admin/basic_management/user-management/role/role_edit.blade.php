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
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ $an_item->name }}" required>
</div>
<div class="mb-3">
    <label class="col-form-label">Roles:</label>
    <div class="row">
        @foreach ($permissions as $group => $perms)
            <div class="col-lg-4 col-md-6 mb-3">
                <strong>{{ $group }}</strong>
                @foreach ($perms as $perm)
                    <div class="ms-3 form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $perm->id }}" name="permissions[]" {{ $an_item->getPermissionNames()->contains($perm->name) ? 'checked' : '' }}>
                        <label class="form-check-label" for="">{{ $perm->display_name }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
</div>
