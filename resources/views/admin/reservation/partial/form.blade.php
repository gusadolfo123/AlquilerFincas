

      
      {!! Form::hidden('id', null, null) !!}
             
      <div class="form-group">
          Finca
          {!! Form::select('finca_id', $fincas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una Finca...', 'id' => 'finca_id']) !!}      
      </div>

      <div class="form-group">
          Estado
          {!! Form::select('estado', $estados, $reserva->estado, ['class' => 'form-control', 'placeholder' => 'Seleccione un Estado...', 'id' => 'estado']) !!}      
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Fecha Reserva</span>
        </div>
        {!! Form::date("fec_Reserva", null, ['class' => 'form-control form-control-sm', 'id' => 'fec_Reserva']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Fecha Ingreso</span>
        </div>
        {!! Form::date("fec_Ingreso", null, ['class' => 'form-control form-control-sm', 'id' => 'fec_Ingreso', 'data-date-format' => "YYYY-MM-DD", 'date-format' => 'mediumDate']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Fecha Salida</span>
        </div>
        {!! Form::date("fec_Salida", null, ['class' => 'form-control form-control-sm', 'id' => 'fec_Salida']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Pre-Cotizacion</span>
        </div>
        {!! Form::number("preCotizacion", null, ['class' => 'form-control form-control-sm', 'id' => 'preCotizacion']) !!}
      </div>      
      
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Nro Huespedes</span>
        </div>
        {!! Form::number("cant_huespedes", null, ['class' => 'form-control form-control-sm', 'id' => 'cant_huespedes']) !!}
      </div> 
          
      <div class="col-sm-12 ml-0 pl-0">
        <h5 class="card-title pt-4">Requerimientos</h5>
        {!! Form::textarea('requerimientos', null, ['class' => 'ckeditor', 'id' => 'requerimientos']) !!}
      </div>

      <button type="submit" id="enviarDatos" class="btn btn-primary mt-4">Enviar</button>
