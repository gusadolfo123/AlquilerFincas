

      {!! Form::hidden('slug', null, ['id' => 'slug']) !!}
      {{--  <input type="hidden" name="slug" id="slug">  --}}

      
    
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Nombre</span>
        </div>
        {!! Form::text("nombre", null, ['class' => 'form-control form-control-sm', 'id' => 'nombre']) !!}
        {{--  <input name="nombre" id="nombre" type="text" class="form-control form-control-sm" aria-label="Nombre Finca" aria-describedby="basic-addon1">  --}}
      </div>
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Direccion</span>
        </div>
        {!! Form::text("direccion", null, ['class' => 'form-control form-control-sm', 'id' => 'direccion']) !!}
        {{--  <input name="direccion" type="text" class="form-control form-control-sm" aria-label="Nombre Finca" aria-describedby="basic-addon1">  --}}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Precio Temporada Alta</span>
        </div>
        {!! Form::number("precio_Talta", null, ['class' => 'form-control form-control-sm', 'id' => 'precio_Talta']) !!}
        {{--  <input name="precio_Talta" type="text" class="form-control form-control-sm" aria-label="Precio Temporada Alta" aria-describedby="basic-addon1">  --}}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Precio Temporada Media</span>
        </div>
        {!! Form::number("precio_Tmedia", null, ['class' => 'form-control form-control-sm', 'id' => 'precio_Tmedia']) !!}
        {{--  <input name="precio_Tmedia" type="text" class="form-control form-control-sm" aria-label="Precio Temporada Media" aria-describedby="basic-addon1">  --}}
      </div>

      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text form-control-sm" id="basic-addon1">Precio Temporada Baja</span>
        </div>
        {!! Form::number("precio_Tbaja", null, ['class' => 'form-control form-control-sm', 'id' => 'precio_Tbaja']) !!}
        {{--  <input name="precio_Tbaja" type="text" class="form-control form-control-sm" aria-label="Precio Temporada Baja" aria-describedby="basic-addon1">  --}}
      </div>      
      
      <div class="form-group">
          Departmento
          {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un departamento...']) !!}
          {{--  <select class="form-control" name="departamento_id">
              @foreach($departamentos as $departmento)
              <option value="{{ $departmento->id }}">{{ $departmento->descripcion }}</option>
              @endforeach
          </select>  --}}
      </div>

      <div class="form-group">
          Via
          {!! Form::select('via_id', $vias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una via...']) !!}
          {{--  <select class="form-control" name="via_id">
              @foreach($vias as $via)
              <option value="{{ $via->id }}">{{ $via->descripcion }}</option>
              @endforeach
          </select>  --}}
      </div>

      <div class="col-12 col-sm-12"> 
        <h5 class="card-title pt-4">Capacidad y Servicios</h5>
        <div class="row">
          <div class="custom-control custom-checkbox col">
            {{--  <input type="checkbox" class="custom-control-input" name="sn_jacuzi" id="sn_jacuzi">  --}}
            {!! Form::checkbox('sn_jacuzi', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_jacuzi']) !!}
            <label class="custom-control-label" for="sn_jacuzi" >Jacuzi</label>
          </div>
          <div class="custom-control custom-checkbox col">
            {{--  <input type="checkbox" class="custom-control-input" name="sn_piscina" id="sn_piscina">  --}}
            {!! Form::checkbox('sn_piscina', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_piscina']) !!}
            <label class="custom-control-label" for="sn_piscina" class="sn_piscina">Piscina </label>
          </div>     
          <div class="custom-control custom-checkbox col">
            {{--  <input type="checkbox" class="custom-control-input" name="sn_picnic" id="sn_picnic">  --}}
            {!! Form::checkbox('sn_picnic', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_picnic']) !!}
            <label class="custom-control-label" for="sn_picnic" class="sn_picnic">Picnic</label>
          </div>  
          <div class="custom-control custom-checkbox col">
            {{--  <input type="checkbox" class="custom-control-input" name="sn_caballos" id="sn_caballos">  --}}
            {!! Form::checkbox('sn_caballos', null, null, [ 'class' => 'custom-control-input', 'id' => 'sn_caballos']) !!}
            <label class="custom-control-label" for="sn_caballos" class="sn_caballos">Caballos</label>
          </div>  
          <div class="custom-control custom-checkbox col">
            {{--  <input type="checkbox" class="custom-control-input" name="sn_parqueadero" id="sn_parqueadero">  --}}
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
              {!! Form::number('max_personas', null, [ 'class' => 'form-control form-control-sm col-12']) !!}
              {{--  <input name="max_personas" type="number" class="form-control form-control-sm col-12" aria-label="Cantidad Personas" aria-describedby="basic-addon1">  --}}
            </div>
          </div>

          <div class="col-12 col-sm-6 pl-0">
            <div class="input-group mb-3 mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Cantidad Baños</span>
              </div>
              {!! Form::number('cant_banios', null, [ 'class' => 'form-control form-control-sm col-12']) !!}
              {{--  <input name="cant_banios" type="number" class="form-control form-control-sm col-12" aria-label="Cantidad Baños" aria-describedby="basic-addon1">  --}}
            </div>
          </div>

          <div class="col-12 col-sm-6 pl-0">
            <div class="input-group mb-3 mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text form-control-sm" id="basic-addon1">Cantidad Habitaciones</span>
              </div>
              {!! Form::number('cant_habitaciones', null, [ 'class' => 'form-control form-control-sm col-12']) !!}
              {{--  <input name="cant_habitaciones" type="number" class="form-control form-control-sm col-12" aria-label="Cantidad Habitaciones" aria-describedby="basic-addon1">  --}}
            </div>
          </div>

        </div>     
      </div>

      <div class="col-sm-12 ml-0 pl-0">
        <h5 class="card-title pt-4">Descripcion</h5>
        {!! Form::textarea('descripcion', null, ['class' => 'ckeditor']) !!}
        {{--  <textarea class="ckeditor" name="descripcion" id="editor1" rows="10" cols="80"></textarea>  --}}
      </div>

      <button type="submit" class="btn btn-primary mt-4">Enviar</button>

   
</div>


@section('scripts')
  <script src="{{ asset('vendor/StringToSlug/jquery.stringToSlug.min.js') }}"></script>

  <script>
      $(document).ready(function(){
        $('#nombre').stringToSlug({
          callback: function(text){
            $('#slug').val(text);            
          }
        });
      });
  </script>
 
@endsection