<div style="height: 100%" class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Grafico de Ventas</h3>
        <!--Filtros por sucursal-->
        <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-sm btn-alt-primary px-3" id="dropdown-analytics-overview"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sucursal <i class="fa fa-fw fa-angle-down"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-analytics-overview"
                style="">
                @foreach ($branches as $branch)
                    <a class="dropdown-item" wire:click="filter('{{$branch->id}}')" >{{ $branch->name }}</a>
                @endforeach

            </div>
        </div>
        <!--Fin Filtros por sucursal-->
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                data-action-mode="demo">
                <i class="si si-refresh"></i>
            </button>
        </div>
    </div>
    <div class="block-content block-content-full text-center">
        <div class="py-3">
            <!-- Lines Chart Container -->
            <div style="height: 32rem;">
                <livewire:livewire-column-chart :column-chart-model="$chart" />
             </div>


        </div>
    </div>
</div>
