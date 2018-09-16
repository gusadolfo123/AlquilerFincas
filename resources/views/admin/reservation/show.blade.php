@extends('layouts.appAdmin')

@section('content')


<h1 class=" page-header text-center mt-3">Reserva Nro: {{ $reserva->id }}</h1>

<div class="container">        
  <div class="row pb-4 justify-content-center">    
             
      <div class="form-group">
          Finca
          {!! Form::select('finca_id', $fincas, $reserva->finca->id, ['class' => 'form-control', 'id' => 'finca_id', 'disabled']) !!}      
      </div>

      <div class="form-group">
          Estado
          {!! Form::select('estado', $estados, $reserva->estado, ['class' => 'form-control', 'id' => 'estado', 'disabled']) !!}      
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Fecha Reserva</span>
        </div>
        {!! Form::date("fec_Reserva", $reserva->fec_Reserva, ['class' => 'form-control form-control-sm', 'id' => 'fec_Reserva', 'readonly']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Fecha Ingreso</span>
        </div>
        {!! Form::date("fec_Ingreso", $reserva->fec_Ingreso, ['class' => 'form-control form-control-sm', 'id' => 'fec_Ingreso', 'readonly', 'data-date-format' => "YYYY-MM-DD", 'date-format' => 'mediumDate']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Fecha Salida</span>
        </div>
        {!! Form::date("fec_Salida", $reserva->fec_Salida, ['class' => 'form-control form-control-sm', 'id' => 'fec_Salida', 'readonly']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Pre-Cotizacion</span>
        </div>
        {!! Form::number("preCotizacion", $reserva->preCotizacion, ['class' => 'form-control form-control-sm', 'id' => 'preCotizacion', 'readonly']) !!}
      </div>      
      
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Nro Huespedes</span>
        </div>
        {!! Form::number("cant_huespedes", $reserva->cant_huespedes, ['class' => 'form-control form-control-sm', 'id' => 'cant_huespedes', 'readonly']) !!}
      </div> 
          
      <div class="col-sm-12 ml-0 pl-0">
        <h5 class="card-title pt-4">Requerimientos</h5>
        <div class="row">
            <div class="col">
                {!! $reserva->requerimientos !!}
            </div>                        
        </div>
      </div>

      <div class="row pt-4">
        <td>
            <a href="{{ route('reservations.edit', $reserva->id) }}" class="dialog-window">
                <button type="button" class="btn btn-primary mr-2" aria-label="Left Align">
                    <i class="fas fa-pencil-alt"></i> Modificar 
                </button>
            </a>
        </td>      
      </div>  
     
  </div>
</div>

@endsection
