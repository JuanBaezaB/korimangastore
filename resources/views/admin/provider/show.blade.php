@extends('layouts.backend')

@section('template_title')
    {{ $provider->name ?? 'Show Provider' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show provider</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('provider.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Sucursal:</strong>
                            {{ $provider->nombre_sucursal }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion Sucursal:</strong>
                            {{ $provider->direccion_sucursal }}
                        </div>
                        <div class="form-group">
                            <strong>Jefe Sucursal:</strong>
                            {{ $provider->jefe_sucursal }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Sucursal:</strong>
                            {{ $provider->telefono_sucursal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
