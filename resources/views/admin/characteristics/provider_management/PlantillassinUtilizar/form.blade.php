@extends('layouts.backend')
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_sucursal') }}
            {{ Form::text('nombre_sucursal', $provider->nombre_sucursal, ['class' => 'form-control' . ($errors->has('nombre_sucursal') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Sucursal']) }}
            {!! $errors->first('nombre_sucursal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion_sucursal') }}
            {{ Form::text('direccion_sucursal', $provider->direccion_sucursal, ['class' => 'form-control' . ($errors->has('direccion_sucursal') ? ' is-invalid' : ''), 'placeholder' => 'Direccion Sucursal']) }}
            {!! $errors->first('direccion_sucursal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jefe_sucursal') }}
            {{ Form::text('jefe_sucursal', $provider->jefe_sucursal, ['class' => 'form-control' . ($errors->has('jefe_sucursal') ? ' is-invalid' : ''), 'placeholder' => 'Jefe Sucursal']) }}
            {!! $errors->first('jefe_sucursal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_sucursal') }}
            {{ Form::text('telefono_sucursal', $provider->telefono_sucursal, ['class' => 'form-control' . ($errors->has('telefono_sucursal') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Sucursal']) }}
            {!! $errors->first('telefono_sucursal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>