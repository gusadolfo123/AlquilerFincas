@extends('layouts.app')

@section('content')

<div class="row-fluid">
    <div class="col-12 bg-dark py-3 border border-right-0 border-left-0 border-top-0 border-success">        
        <form action="{{ url('/fincas') }}" method="POST" class="form-row align-items-end">    
            {{ csrf_field() }}
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label for="datePickerEntrada" class="text-white">Fechas</label> 
                    <div class="input-group">
                        @if(isset($data))
                        <input id="datePickerEntrada" name="fecEntrada"  class="form-control" placeholder="Entrada" readonly="readonly" value="{{ $data['fecEntrada'] }}" required>  
                        <input id="datePickerSalida" name="fecSalida" class="form-control" placeholder="Salida" readonly="readonly" value="{{ $data['fecSalida'] }}" required>
                        @else
                        <input id="datePickerEntrada" name="fecEntrada"  class="form-control" placeholder="Entrada" readonly="readonly" required>  
                        <input id="datePickerSalida" name="fecSalida" class="form-control" placeholder="Salida" readonly="readonly" required>
                        @endif
                    </div>      
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label for="datePickerEntrada" class="text-white">Cantidad Huespedes</label> 
                    <div class="input-group">    
                        @if(isset($data))
                        <input id="cantAdultos" name="cantAdultos"  class="form-control" type="number" placeholder="Adultos" value="{{ $data['cantAdultos'] }}" required>                
                        <input id="cantNinos" name="cantNinos"  class="form-control"  type="number" placeholder="Niños" value="{{ $data['cantNinos'] }}" required>  
                        @else
                        <input id="cantAdultos" name="cantAdultos"  class="form-control" type="number" placeholder="Adultos" required>                
                        <input id="cantNinos" name="cantNinos"  class="form-control"  type="number" placeholder="Niños" required>  
                        @endif
                    </div>   
                </div>
            </div> 
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group text-center">     
                    <label for="txtDepartamento" class="text-white">Departamento</label> 
                    @if(isset($data))
                    <input id="txtDepartamento" name="departamento" class="form-control" type="text" placeholder="Departamento" value="{{ $data['departamento'] }}" required>                
                    @else
                    <input id="txtDepartamento" name="departamento" class="form-control" type="text" placeholder="Departamento" required>          
                    @endif
                </div>
            </div>      
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 pb-3">
                <button type="submit" class="btn btn-success btn-lg btn-block btn-md hbutton">Buscar</button>
            </div>
        </form>
    </div>  
</div>

<div class="row-fluid myBody">
    <div class="container">           
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 mt-5">
                <div class="card text-success mb-3">
                    <div class="card-header">Cotizacion</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Precios x Noche:</label>
                                <br />
                                <label>Temp. Baja: $ {{ $finca->precio_Tbaja }}</label>
                                <br />
                                <label>Temp. Alta: $ {{ $finca->precio_Talta }}</label>
                                <br />
                                <label>Ciudad: {{ $finca->ciudad->descripcion }}</label>
                            </div>
                            <div class="form-group">
                                <label for="chkBanios">Baños</label>
                                <input type="number" class="form-control" id="chkBanios" value="1">
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col">
                                    <i class="fas fa-trash"></i> <a href="#">Quitar Filtros</a>
                                </div>
                            </div>
                            <hr />
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 mt-5">
                <section class="slider">
                    <div id="slider" class="flexslider mb-0 fondo_transparente">
                        <ul class="slides">
                            @foreach($finca->fotos as $foto)
                                <li>
                                    <img src="{{ $foto->archivo }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider fondo_transparente">
                        <ul class="slides">
                            @foreach($finca->fotos as $foto)
                                <li>
                                    <img src="{{ $foto->archivo }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>      
        $(window).load(function(){
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                itemMargin: 5,
                asNavFor: '#slider'
        });

        $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel",
                start: function(slider){
                $('body').removeClass('loading');
                }
            });
        });
    </script>
@endsection

@endsection


