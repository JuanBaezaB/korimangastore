@extends('layouts.backend')

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

    <div class="content">
        <!-- Overview -->
        <div class="row items-push">
          <div class="col-sm-6 col-xl-3">
            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
              <div class="block-content block-content-full flex-grow-1">
                <div class="item rounded-3 bg-body mx-auto my-3">
                  <i class="fa fa-users fa-lg text-primary"></i>
                </div>
                <div class="fs-1 fw-bold">2,388</div>
                <div class="text-muted mb-3">Usuarios registrados</div>
                <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                  <i class="fa fa-caret-up me-1"></i>
                  19.2%
                </div>
              </div>
              <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                <a class="fw-medium" href="javascript:void(0)">
                  View all users
                  <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
              <div class="block-content block-content-full flex-grow-1">
                <div class="item rounded-3 bg-body mx-auto my-3">
                  <i class="fa fa-level-up-alt fa-lg text-primary"></i>
                </div>
                <div class="fs-1 fw-bold">14.6%</div>
                <div class="text-muted mb-3">Bounce Rate</div>
                <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                  <i class="fa fa-caret-down me-1"></i>
                  2.3%
                </div>
              </div>
              <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                <a class="fw-medium" href="javascript:void(0)">
                  Explore analytics
                  <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
              <div class="block-content block-content-full flex-grow-1">
                <div class="item rounded-3 bg-body mx-auto my-3">
                  <i class="fa fa-chart-line fa-lg text-primary"></i>
                </div>
                <div class="fs-1 fw-bold">386</div>
                <div class="text-muted mb-3">Ventas Confirmadas</div>
                <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                  <i class="fa fa-caret-up me-1"></i>
                  7.9%
                </div>
              </div>
              <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                <a class="fw-medium" href="javascript:void(0)">
                  View all sales
                  <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
              <div class="block-content block-content-full">
                <div class="item rounded-3 bg-body mx-auto my-3">
                  <i class="fa fa-wallet fa-lg text-primary"></i>
                </div>
                <div class="fs-1 fw-bold">$4,920</div>
                <div class="text-muted mb-3">Ganancias Totales</div>
                <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                  <i class="fa fa-caret-down me-1"></i>
                  0.3%
                </div>
              </div>
              <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                <a class="fw-medium" href="javascript:void(0)">
                  Withdrawal options
                  <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- END Overview -->
    </div>

@endsection
