

      {!! Form::hidden('id', null, null) !!}
             
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Nombre</span>
        </div>
        {!! Form::text("nombre", null, ['class' => 'form-control form-control-sm', 'id' => 'nombre']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Email</span>
        </div>
        {!! Form::email("email", null, ['class' => 'form-control form-control-sm', 'id' => 'email']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Telefono 1</span>
        </div>
        {!! Form::number("telefono1", null, ['class' => 'form-control form-control-sm', 'id' => 'telefono1']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Telefono 2</span>
        </div>
        {!! Form::number("telefono2", null, ['class' => 'form-control form-control-sm', 'id' => 'telefono2']) !!}
      </div>

     
      <button type="submit" id="enviarDatos" class="btn btn-primary mt-4">Enviar</button>
