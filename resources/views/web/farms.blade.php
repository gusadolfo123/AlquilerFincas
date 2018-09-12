@extends('layouts.app')

@section('content')

<div class="row-fluid">
    <div class="col-12 bg-dark py-3 border border-right-0 border-left-0 border-top-0 border-success">        
        <form action="{{ url('/fincas') }}" method="POST" class="form-row align-items-end">    
            {{ csrf_field() }}
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label class="text-white">Fechas</label> 
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
                        <input id="cantHuespedes" name="cantHuespedes"  class="form-control" type="number" placeholder="Nro Huespedes" value="{{ $data['cantHuespedes'] }}" required>
                        @else
                        <input id="cantHuespedes" name="cantHuespedes"  class="form-control" type="number" placeholder="Nro Huespedes" required>
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
    
<!-- <div cl7ass="row pt-4 pb-2 ml-2 mr-2 myBody"> -->
<div class="row-fluid myBody">
    <div class="container">   

        <div class="row-fluid pt-3">
            <div class="alert alert-success alert-dismissible mb-0 fade show" role="alert">
                <strong>Informacion de Busqueda:</strong> 
                <p>Tenga en cuenta que el precio puede variar segun el tipo de temporada identificadas en el calendario mediante los colores: 
                (<span style="background-color: rgb(233, 152, 152); color: white;"> Alta </span>,<span style="background-color: rgb(11, 163, 150); color:white;"> Media </span>).</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div> 

        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 mt-5">
                <div class="card text-success mb-3">
                <div class="card-header">Filtros</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="txtHabitaciones">Habitaciones</label>
                                <input type="number" class="form-control" id="txtHabitaciones" value="1">
                            </div>
                            <div class="form-group">
                                <label for="txtBanios">Baños</label>
                                <input type="number" class="form-control" id="txtBanios" value="1">
                            </div>

                            <hr />

                            <p class="card-text">Servicios:</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="chkJacuzi" id="chkJacuzi">
                                <label class="custom-control-label" for="chkJacuzi" >Jacuzi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="chkPiscina" id="chkPiscina">
                                <label class="custom-control-label" for="chkPiscina" class="chkPiscina">Piscina </label>
                            </div>

                            <hr />

                            <p class="card-text">Via:</p>

                            @foreach($vias as $via)
                            <div class="custom-control custom-radio">
                                <input type="radio" id="{{ $via->id }}" value="{{ $via->id }}"  name="optVia" class="custom-control-input">
                                <label class="custom-control-label" for="{{ $via->id }}">
                                    <small class="bg-success text-light rounded pl-1 pr-1">{{ $via->descripcion }}</small>
                                </label>
                            </div>
                            @endforeach
                            
                            <hr />

                            <div class="row">
                                <div class="col">
                                    <i class="fas fa-trash"></i> <a href="{{ url('/fincas') }}">Quitar Filtros</a>
                                </div>
                            </div>
                            <hr />
                            <button type="button" class="btn btn-primary" onclick="filtrar();" >Filtrar</button>
                        </form>
                    </div>
                </div> 
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 mt-5 mb-5">
                <div class="card text-success mb-3">
                    @include('web.list.listFarms')
                </div>
            </div>
        </div>            
    </div>
</div>

@endsection
