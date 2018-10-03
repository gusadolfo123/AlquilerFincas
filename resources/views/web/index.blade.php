@extends('layouts.app')

@section('content')

<div class="row-fluid">
    <div class="alert alert-success alert-dismissible mb-0 fade show" role="alert">
        <strong>Informacion de Busqueda:</strong> 
        <p>Tenga en cuenta que el precio puede variar segun el tipo de temporada identificadas en el calendario mediante los colores: 
        (<span style="background-color: rgb(233, 152, 152); color: white;"> Alta </span>,<span style="background-color: rgb(11, 163, 150); color:white;"> Media </span>).</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div> 

<div class="row-fluid">
    <!-- <div class="col-12 bg-primary py-3"> Fondo Azul -->
    <div class="col-12 bg-dark py-3 border border-right-0 border-left-0 border-top-0 border-success">        
        <form name="formSearch" id="formSearch" action="{{ url('/fincas') }}" method="POST" class="form-row align-items-end">    
            {{ csrf_field() }}
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label for="datePickerEntrada" class="text-white">Fechas</label> 
                    <div class="input-group">    
                        <input id="datePickerEntrada" name="fecEntrada"  class="form-control" placeholder="Entrada" readonly="readonly" required>  
                        <input id="datePickerSalida" name="fecSalida" class="form-control" placeholder="Salida" readonly="readonly" required>
                    </div>      
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label class="text-white">Cantidad Huespedes</label> 
                    <div class="input-group">    
                        <input id="cantHuespedes" name="cantHuespedes"  class="form-control" type="number" placeholder="Nro Huespedes" required>
                    </div>   
                </div>
            </div> 
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group text-center">     
                    <label for="txtDepartamento" class="text-white">Departamento</label> 
                    {{-- <input id="txtDepartamento" name="departamento" class="form-control" type="text" placeholder="Departamento" required> --}}
                    <div class="form-group">
                        {!! Form::select('departamento_id', $departamentos, null, ['class' => 'form-control', 'required', 'placeholder' => 'Departamento...', 'id' => 'departamento_id']) !!}      
                    </div>
                </div>
            </div>      
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 pb-3">
                <button type="submit" class="btn btn-success btn-lg btn-block btn-md hbutton">Buscar</button>
            </div>
        </form>
    </div>  
</div>  

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/3.jpg" alt="First slide">
            
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/cascada.png" alt="Second slide">
            
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/amigos.png" alt="Third slide">
            
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

@endsection
