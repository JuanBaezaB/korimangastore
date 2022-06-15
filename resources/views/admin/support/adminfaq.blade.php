@extends('layouts.backend')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Preguntas frecuentes - Administrador</h1>
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

        <!-- Pregunta 1 -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <i class="fa-solid fa-circle-question pe-2"></i>
                <h3 class="block-title">Pregunta 1</h3>
                <div class="block-options">
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-message pe-2"></i><b>Respuesta: </b>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum nihil totam ab consectetur laboriosam non qui voluptate facilis cumque tempore aliquam, asperiores placeat expedita veritatis quaerat eaque! Similique, suscipit ratione!
                  </div>
            </div>
        </div>

        <!-- Pregunta 2 -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <i class="fa-solid fa-circle-question pe-2"></i>
                <h3 class="block-title">Pregunta 2</h3>
                <div class="block-options">
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-message pe-2"></i><b>Respuesta: </b>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum nihil totam ab consectetur laboriosam non qui voluptate facilis cumque tempore aliquam, asperiores placeat expedita veritatis quaerat eaque! Similique, suscipit ratione!
                  </div>
            </div>
        </div>
    </div>
@endsection
