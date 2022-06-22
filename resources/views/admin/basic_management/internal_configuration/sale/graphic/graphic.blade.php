<!--Con este canvas se muestra el grafico dependiendo de la Id que se le da en la configuracion del grafico-->
@extends('layouts.backend')

@section('content')
    <!-- Page Content -->

    <div class="content">
        <!-- Simple -->
        <h2 class="content-heading">Estadisticas</h2>
        <div class="row">
            <div class="col-md-6 col-xl-3 d-none">
                <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-arrow-up text-primary"></i>
                        </div>
                        <div class="ms-3 text-end">
                            <p class="fs-3 fw-medium mb-0">
                                {{ $mark }}{{ $pEarnings }}%
                            </p>
                            <p class="text-muted mb-0">
                                Porcentaje de ganancias
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="far fa-2x fa-user-circle text-success"></i>
                        </div>
                        <div class="ms-3 text-end">
                            <p class="fs-3 fw-medium mb-0">
                                {{ $cUsers }}
                            </p>
                            <p class="text-muted mb-0">
                                Usuarios registrados
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <p class="fs-3 fw-medium mb-0">
                                {{ $cSales }}
                            </p>
                            <p class="text-muted mb-0">
                                Ventas registradas
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-chart-area text-danger"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="me-3">
                            <p class="fs-3 fw-medium mb-0">
                                {{ $cProducts }}

                            </p>
                            <p class="text-muted mb-0">
                                Cantidad de Productos
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-box text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Simple -->
            <div class="row">
                <div class="col-xl-12">
                    <!-- Lines Chart -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Ventas</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-center">
                            <div class="py-3">
                                <!-- Lines Chart Container -->
                                <canvas id="grafico1" width="553" height="276"
                                    style="display: block; box-sizing: border-box; height: 276px; width: 553px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- END Lines Chart -->
                </div>
                <div class="col-xl-6 d-none">
                    <!-- Bars Chart -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Productos más vendidos</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-center">
                            <div class="py-3">
                                <!-- Bars Chart Container -->
                                <canvas id="grafico2" width="553" height="276"
                                    style="display: block; box-sizing: border-box; height: 276px; width: 553px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- END Bars Chart -->
                </div>
                
                

            @endsection

            <!-- END Page Content -->




            @section('js_after')
                {{-- Setting JSconst labels = {!! json_encode($labels) !!};
                        const data = {!! json_encode($data) !!}; variables from PHP --}}
                <script>
                    // DATA FROM PHP TO JAVASCRIPT
                    //
                </script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

                <script>
                    const $data = {{Js::from($salesMonth)}};

                    const ctx = document.getElementById('grafico1').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: Object.keys($data),
                            datasets: [{
                                label: 'Grafico de Ventas',
                                data: Object.values($data),
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

                <script>
                    // Obtener una referencia al elemento canvas del DOM
                    const $grafica = document.querySelector("#grafico2");
                    // Las etiquetas son las porciones de la gráfica
                    const etiquetas = ["Figuras", "Mangas", "Ropa", "Pines"]
                    // Podemos tener varios conjuntos de datos. Comencemos con uno
                    const datosIngresos = {
                        data: [1500, 400, 2000,
                        7000], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                        // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
                        backgroundColor: [
                            'rgba(163,221,203,0.2)',
                            'rgba(232,233,161,0.2)',
                            'rgba(230,181,102,0.2)',
                            'rgba(229,112,126,0.2)',
                        ], // Color de fondo
                        borderColor: [
                            'rgba(163,221,203,1)',
                            'rgba(232,233,161,1)',
                            'rgba(230,181,102,1)',
                            'rgba(229,112,126,1)',
                        ], // Color del borde
                        borderWidth: 1, // Ancho del borde
                    };
                    new Chart($grafica, {
                        type: 'pie', // Tipo de gráfica. Puede ser dougnhut o pie
                        data: {
                            labels: etiquetas,
                            datasets: [
                                datosIngresos,
                                // Aquí más datos...
                            ]
                        },
                    });
                </script>
            @endsection
