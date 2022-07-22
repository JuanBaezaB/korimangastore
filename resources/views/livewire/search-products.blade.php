<div>
    @if (request()->is('/'))
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-lg-none d-xl-block">
        <input  wire:model="search" wire:keyup.debounce="filter" type="search" class="form-control form-control-dark bg-dark btn-outline-info text-white mb-1 mt-1"
        placeholder="🔍︎ Busca aquí tu producto..." aria-label="Search">
    </form>


    @else
        <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-lg-none d-xl-block">
            <input  wire:model="search" wire:keyup.debounce="filter" type="search" class="form-control form-control-dark bg-dark btn-outline-info text-white mb-1 mt-1"
            placeholder="🔍︎ Busca aquí tu producto..." aria-label="Search">
        </div>
    @endif

</div>
