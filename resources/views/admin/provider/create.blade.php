@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Proveedores</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Proveedores</li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Proveedores</li>
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
            <h3 class="block-title">Poveedores</h3>
        </div>
        <div class="block-content">
            <form action="{{url('/provider')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <!-- Basic Elements -->
                <h2 class="content-heading pt-0">Lista</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            The most often used inputs you know and love
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label" for="Nombre">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="Descricion">Descricion</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Descricion">
                        </div>
                        <div class="block-content block-content-full ">
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Crear</button>
                        </div>
                    </div>
                </div>
                <!-- END Basic Elements -->
        </div>
        <!-- END Page Content -->
    </div>
</div>

@endsection