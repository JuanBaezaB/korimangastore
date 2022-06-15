<!--Con este canvas se muestra el grafico dependiendo de la Id que se le da en la configuracion del grafico-->
@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Grafico productos</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Grafico</li>
                    <li class="breadcrumb-item active" aria-current="page">Gestion de Productos</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Elements -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Grafico</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table id="product-table" class="table table-bordered table-striped table-vcenter table-hover w-100 display nowrap">

                <tbody>

                    <canvas id="grafico" style="height: 450px;width: 100%;"></canvas>


            </table>
        </div>
    </div>
    <!-- END Elements -->
</div>
<!-- END Page Content -->
@endsection

<!-- END Page Content -->


@section('js_after')


     
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

<script>
    const ctx = document.getElementById('grafico').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre', ],
            datasets: [{
                label: 'Grafico de Ventas',
                data: [{!!json_encode($sales)!!},2, 3, 6, 8,5, 3, 9],
                //data: [3, 5, 7, 8, 7, 2, 3, 6, 8, 5, 3, 9],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection