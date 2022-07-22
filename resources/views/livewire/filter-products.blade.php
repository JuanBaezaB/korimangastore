<div class="mx-5">
    <div class=" row my-4">
        <div class="col-lg-3 col-md-5 col-sm-12 mt-3">
                    <label for="">Categorías: </label>
                    <select wire:model="category_id" wire:change="filter" class="form-control form-select"
                        data-placeholder="Selecciona una categoría">
                        <option value="">Todas</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>

        </div>

        <div class="col-lg-3 col-md-5 col-sm-12 mt-3 align-items-end">
            <label for="">Ordenar por:</label>
            <select wire:model="sort_by" wire:change="filter"  class="form-control form-select"
                data-placeholder="Selecciona una categoría">
                <option value="">Recomendado</option>
                <option value="min">Menor precio</option>
                <option value="max">Mayor precio</option>
            </select>
        </div>

        <div class="col-lg-6 col-md-2 col-sm-12 mt-3">

        </div>
    </div>
</div>
