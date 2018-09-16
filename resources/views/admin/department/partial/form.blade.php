     
      {!! Form::hidden('id', null, null) !!}
    
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Nombre</span>
        </div>
        {!! Form::text("descripcion", null, ['class' => 'form-control form-control-sm', 'id' => 'descripcion']) !!}
      </div>

      <button type="submit" id="enviarDatos" class="btn btn-primary mt-4">Enviar</button>
