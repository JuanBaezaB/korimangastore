@extends('layouts.backend')

@section('title')
    {{ 'Dashboard' }}
@endsection

@section('content')
     <!-- Hero -->
     <div class="bg-image" style="background-image: url('/media/various/bg_dashboard_3.png');">
        <div class="bg-primary-dark-op">
            <div class="content content-full">
                <div class="row my-3">
                    <div class="col-md-6 d-md-flex align-items-md-center">
                        <div class="py-4 py-md-0 text-center text-md-start">
                            <h1 class="fs-2 text-white mb-2">Dashboard</h1>
                            <h2 class="fs-lg fw-normal text-white-75 mb-0">Welcome to your overview</h2>
                        </div>
                    </div>
                    <div class="col-md-6 d-md-flex align-items-md-center">
                        <div class="row w-100 text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="content">
            <!-- Simple -->

            <div class="row">
                <!-- Porcentaje de ventas -->
                <div class="col-md-6 col-xl-3 ">
                    <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                @if ($percentListSales['mark'] == '+')
                                    <i class="fa fa-2x fa-arrow-up text-primary"></i>
                                @elseif($percentListSales['mark'] == '- ' && $percentListSales['percent'] != '-')
                                    <i class="fa fa-2x fa-arrow-down text-primary"></i>
                                @else
                                    <i class="fa fa-2x fa-arrow-down text-primary d-none"></i>
                                @endif

                            </div>
                            <div class="ms-3 text-end">
                                <p class="fs-3 fw-medium mb-0">
                                    {{ $percentListSales['mark'] }}{{ $percentListSales['percent'] }}%
                                </p>
                                <p class="text-muted mb-0">
                                    porcentaje de ventas
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Usuarios Registrados -->
                <div class="col-md-6 col-xl-3   ">
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
                <!-- Ventas registradas-->
                <div class="col-md-6 col-xl-3   ">
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
                <!-- Ventas registradas-->
                <div class="col-md-6 col-xl-3   ">
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
                    <div class="col-xl-12 ">
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
                    </div>
                    <!-- Grafico de barras -->
                    <div class="col-xl-6 ">
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

                    <!-- Tabla Productos mas vendidos -->
                    <div class="col-xl-6">
                        <div class="block block-rounded block-mode-loading-refresh h-100 mb-0">
                          <div class="block-header block-header-default">
                            <h3 class="block-title">Purchases</h3>
                            <div class="block-options">
                              <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                              </button>
                              <button type="button" class="btn-block-option">
                                <i class="si si-cloud-download"></i>
                              </button>
                              <div class="dropdown">
                                <button type="button" class="btn-block-option" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="si si-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-sync fa-spin text-warning me-1"></i> Pending
                                  </a>
                                  <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="far fa-fw fa-times-circle text-danger me-1"></i> Cancelled
                                  </a>
                                  <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="far fa-fw fa-check-circle text-success me-1"></i> Cancelled
                                  </a>
                                  <div role="separator" class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye me-1"></i> View All
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="block-content block-content-full block-content-sm bg-body-dark">
                            <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                              <input type="text" class="form-control form-control-alt" placeholder="Search Purchases..">
                            </form>
                          </div>
                          <div class="block-content">
                            <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                              <thead>
                                <tr class="text-uppercase">
                                  <th class="fw-bold">Producto</th>
                                  <th class="d-none d-sm-table-cell fw-bold">Fecha de compra</th>
                                  <th class="fw-bold">Cantidad</th>
                                </tr>
                              </thead>
                              <tbody>

                                <tr>
                                  <td>
                                    <span class="fw-semibold">iPhone X</span>
                                  </td>
                                  <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">today</span>
                                  </td>
                                  <td>
                                    <span class="fw-semibold text-warning">Pending..</span>
                                  </td>
                                </tr>

                                <tr>
                                  <td>
                                    <span class="fw-semibold">MacBook Pro 15"</span>
                                  </td>
                                  <td class="d-none d-sm-table-cell">
                                    <span class="fs-sm text-muted">today</span>
                                  </td>
                                  <td>
                                    <span class="fw-semibold text-warning">Pending..</span>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- END Purchases -->
                      </div>

                      {{$products}}
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
                        const $data = {{ Js::from($salesMonth) }};

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
                                7000
                            ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
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

