@extends('layouts.backend')

@section('title')
    {{ 'Manual de Usuario' }}
@endsection

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Manual de Usuario - Administrador</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
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
                <h3 class="block-title">Revisa el documento:</h3>
                <div class="block-options">

                </div>
            </div>
            <div class="block-content block-content-full text-center">
                <iframe class="mw-100 mh-100" src="https://drive.google.com/file/d/1bZUhtAO8iEB-aLVQIawZ82CNkVT3b39S/preview" width="640" height="480" allow="autoplay"></iframe>
                <p>También disponible <a href="https://drive.google.com/file/d/1bZUhtAO8iEB-aLVQIawZ82CNkVT3b39S/view">aquí</a>.</p>
            </div>
        </div>
    </div>
@endsection
