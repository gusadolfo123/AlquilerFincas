

      {!! Form::hidden('slug', null, ['id' => 'slug']) !!}
      
      {!! Form::hidden('id', null, null) !!}
      
       
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Nombre</span>
        </div>
        {!! Form::text("nombre", null, ['class' => 'form-control form-control-sm', 'id' => 'nombre']) !!}
      </div>
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Direccion</span>
        </div>
        {!! Form::text("direccion", null, ['class' => 'form-control form-control-sm', 'id' => 'direccion']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Precio Temporada Alta</span>
        </div>
        {!! Form::number("precio_Talta", null, ['class' => 'form-control form-control-sm', 'id' => 'precio_Talta']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Precio Temporada Media</span>
        </div>
        {!! Form::number("precio_Tmedia", null, ['class' => 'form-control form-control-sm', 'id' => 'precio_Tmedia']) !!}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Precio Temporada Baja</span>
        </div>
        {!! Form::number("precio_Tbaja", null, ['class' => 'form-control form-control-sm', 'id' => 'precio_Tbaja']) !!}
      </div>      
      
      <div class="form-group">
          Departmento
          {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un departamento...', 'id' => 'departamento_id']) !!}      
      </div>

      <div class="form-group">
          Via
          {!! Form::select('via_id', $vias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una via...', 'id' => 'via_id']) !!}      
      </div>

      <div class="col-12 col-sm-12"> 
        <h5 class="card-title pt-4">Capacidad y Servicios</h5>
        <div class="row">
          <div class="custom-control custom-checkbox col">
            {!! Form::checkbox('sn_jacuzi', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_jacuzi']) !!}
            <label class="custom-control-label" for="sn_jacuzi" >Jacuzi</label>
          </div>
          <div class="custom-control custom-checkbox col">
            {!! Form::checkbox('sn_piscina', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_piscina']) !!}
            <label class="custom-control-label" for="sn_piscina" class="sn_piscina">Piscina </label>
          </div>     
          <div class="custom-control custom-checkbox col">
            {!! Form::checkbox('sn_picnic', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_picnic']) !!}
            <label class="custom-control-label" for="sn_picnic" class="sn_picnic">Picnic</label>
          </div>  
          <div class="custom-control custom-checkbox col">
            {!! Form::checkbox('sn_caballos', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_caballos']) !!}
            <label class="custom-control-label" for="sn_caballos" class="sn_caballos">Caballos</label>
          </div>  
          <div class="custom-control custom-checkbox col">
            {!! Form::checkbox('sn_parqueadero', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_parqueadero']) !!}
            <label class="custom-control-label" for="sn_parqueadero" class="sn_parqueadero">Parqueadero</label>
          </div>
        </div>   

        <div class="row">
          <div class="col-12 col-sm-6 pl-0">
            <div class="input-group mb-3 mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Cantidad Personas</span>
              </div>
              {!! Form::number('max_personas', null, [ 'class' => 'form-control form-control-sm col-12', 'id' => 'max_personas']) !!}
            </div>
          </div>

          <div class="col-12 col-sm-6 pl-0">
            <div class="input-group mb-3 mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Cantidad Baños</span>
              </div>
              {!! Form::number('cant_banios', null, [ 'class' => 'form-control form-control-sm col-12', 'id' => 'cant_banios']) !!}
            </div>
          </div>

          <div class="col-12 col-sm-6 pl-0">
            <div class="input-group mb-3 mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Cantidad Habitaciones</span>
              </div>
              {!! Form::number('cant_habitaciones', null, [ 'class' => 'form-control form-control-sm col-12', 'id' => 'cant_habitaciones']) !!}
            </div>
          </div>
        </div>     
      </div>


      <div class="col-sm-12 ml-0 pl-0">
        <h5 class="card-title pt-4">Descripcion</h5>
        {!! Form::textarea('descripcion', null, ['class' => 'ckeditor', 'id' => 'descripcion']) !!}
      </div>

     
      <button type="submit" id="enviarDatos" class="btn btn-primary mt-4">Enviar</button>
