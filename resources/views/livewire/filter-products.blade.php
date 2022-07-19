
<div>
    <div>

        <div class="col-auto mt-3">
            <input wire:model="query" wire:keyup.debounce="filter" style="width: 300px" type="search" class="form-control btn-outline-info"
                placeholder="🔍︎ Busca aquí tu producto..." aria-label="Search">
        </div>
        <div class="col-auto mt-3 mb-3">
            <select wire:model="category_id" wire:change="filter" style="width: 300px" class="js-example-basic-single form-control " data-placeholder="Selecciona una categoría">
                <option value="">selecciona uno</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>


