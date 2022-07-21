<div class="mx-5">
    <form action="" class=" row row-cols-lg-auto mt-4 ">
        <div class="col-sm-4 mt-3">
            <input wire:model="query" wire:keyup.debounce="filter" style="width: 300px" type="search" class="form-control"
                placeholder="🔍︎ Busca aquí tu producto..." aria-label="Search">
        </div>
        <div class="col-sm-4 mt-3">
            <select wire:model="category_id" wire:change="filter" style="width: 300px" class="form-control "
                data-placeholder="Selecciona una categoría">
                <option value="">selecciona uno</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4 mt-3">

            <select wire:model="sort_by" wire:change="filter" style="width: 300px" class="form-control "
                data-placeholder="Selecciona una categoría">
                <option value="">Recomendado</option>
                <option value="min">Menor precio</option>
                <option value="max">Mayor precio</option>
            </select>
        </div>
    </form>
</div>
