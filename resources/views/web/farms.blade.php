@extends('layouts.app')

@section('content')

    <div class="row-fluid">
        <!-- <div class="col-12 bg-primary py-3"> Fondo Azul -->
        <div class="col-12 bg-dark py-3 border border-right-0 border-left-0 border-top-0 border-success">        
            <div class="form-row align-items-end">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 two-fields">
                    <div class="form-group text-center">     
                        <label for="datePickerEntrada" class="text-white">Fechas</label> 
                        <div class="input-group">    
                            <input id="datePickerEntrada"  class="form-control" placeholder="Entrada" readonly="readonly">  
                            <input id="datePickerSalida" class="form-control" placeholder="Salida" readonly="readonly">
                        </div>      
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 two-fields">
                    <div class="form-group text-center">     
                        <label for="datePickerEntrada" class="text-white">Cantidad Huespedes</label> 
                        <div class="input-group">    
                            <input id="cantAdultos"  class="form-control" type="number" placeholder="Adultos">                
                            <input id="cantNinos"  class="form-control"  type="number" placeholder="Niños">   
                        </div>   
                    </div>
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group text-center">     
                        <label for="txtDepartamento" class="text-white">Departamento</label> 
                        <input id="txtDepartamento"  class="form-control" type="text" placeholder="Departamento">                
                    </div>
                </div>      
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 pb-3">
                    <button type="submit" class="btn btn-success btn-lg btn-block btn-md hbutton">Buscar</button>
                </div>       
            </div>
        </div>  
    </div>  

    <!-- <div cl7ass="row pt-4 pb-2 ml-2 mr-2 myBody"> -->
    <div class="row-fluid myBody">
        <div class="container">           
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 mt-5">
                    <div class="card text-success mb-3">
                    <div class="card-header">Filtros</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="chkHabitaciones">Habitaciones</label>
                                    <input type="number" class="form-control" id="chkHabitaciones" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="chkBanios">Baños</label>
                                    <input type="number" class="form-control" id="chkBanios" value="1">
                                </div>

                                <hr />

                                <p class="card-text">Servicios:</p>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Jacuzi</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Piscina </label>
                                </div>

                                <hr />

                                <p class="card-text">Via:</p>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Melgar </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Cali</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio3">Boyaca</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4">Medellin</label>
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
                        </div>
                    </div> 
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 mt-5 mb-5">
                    <div class="card text-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Resultado Busqueda: [{{ $cantReg }}]</h5>

                            <? $cont = 0; ?>

                            <div class="row">
                                @foreach($fincas as $finca)
                                    <div class="col-md-6">
                                        <a href="{{ route('farm', $finca->nombre) }}">
                                            <div class="card bg-dark text-success mt-4">
                                                <img class="card-img" src="{{ $finca->fotos->first()->archivo }}" alt="Card image">
                                                <div class="card-img-overlay p-0">
                                                    <h6 class="card-title">
                                                        <small class="bg-success text-light rounded pl-1 pr-1">Via: Bogota - Medellin Km 40  </small>
                                                    </h6>
                                                </div>
                                            </div>                                        
                                            <div class="card-footer border-bottom border-success p-0 pl-2 pr-2">
                                                <div class="row">
                                                    <div class="col-6 bg-dark text-light s1 ">
                                                        <small class="text-light"><i class="fas fa-dollar-sign"></i> {{ number_format($finca->precio_Tbaja, 0) }} Valor Noche</small>
                                                    </div>
                                                    <div class="col-6 bg-primary text-light">
                                                        <small class="text-light"><i class="fas fa-users"></i> Personas: {{ $finca->max_personas }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <hr />
                            <!-- Paginacion -->
                            {{ $fincas->render() }} 
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

    @section('scripts')
        
    @endsection

@endsection
