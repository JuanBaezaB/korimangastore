<div class="mx-5">
    <div class=" row my-4">
        <div class="col-sm-8 mt-3">
            <div class="row row-cols-lg-auto ">
                <div class="col-sm-4">
                    <label for="">Categorías: </label>
                    <select wire:model="category_id" wire:change="filter" style="width: 150px" class="form-control "
                        data-placeholder="Selecciona una categoría">
                        <option value="">Todas</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="col-sm-4 mt-3 align-items-end">
            <label for="">Ordenar por:</label>
            <select wire:model="sort_by" wire:change="filter" style="width: 200px" class="form-control "
                data-placeholder="Selecciona una categoría">
                <option value="">Recomendado</option>
                <option value="min">Menor precio</option>
                <option value="max">Mayor precio</option>
            </select>
        </div>
    </div>
</div>
