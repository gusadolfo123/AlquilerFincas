@extends('layouts.appAdmin')

@section('content')

<h1 class=" page-header text-center mt-3">Detalle Cliente</h1>

<div class="container">        
    <div class="row pb-4 justify-content-center">
        <div class="col-sm-12">
            {!! Form::hidden('id', $cliente->id, null) !!}
                    
            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Nombre</span>
                </div>
                {!! Form::text("nombre", $cliente->nombre, ['class' => 'form-control form-control-sm', 'id' => 'nombre', 'readonly']) !!}
            </div>

            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Email</span>
                </div>
                {!! Form::email("email", $cliente->email, ['class' => 'form-control form-control-sm', 'id' => 'email', 'readonly']) !!}
            </div>

            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Telefono 1</span>
                </div>
                {!! Form::number("telefono1", $cliente->telefono1, ['class' => 'form-control form-control-sm', 'id' => 'telefono1', 'readonly']) !!}
            </div>

            <div class="input-group mb-3 mt-3">
                <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Telefono 2</span>
                </div>
                {!! Form::number("telefono2", $cliente->telefono2, ['class' => 'form-control form-control-sm', 'id' => 'telefono2', 'readonly']) !!}
            </div>
            
        </div>

        <div class="row pt-4">
            <td>
                <a href="{{ route('customers.edit', $cliente->id) }}" class="dialog-window">
                    <button type="button" class="btn btn-primary mr-2" aria-label="Left Align">
                        <i class="fas fa-pencil-alt"></i> Modificar 
                    </button>
                </a>
            </td>      
        </div>  

    
    </div>
</div>

@endsection
