@extends('layouts.app')

@section('content')

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
                        <input id="cantAdultos" name="cantAdultos"  class="form-control" type="number" placeholder="Adultos" required>                
                        <input id="cantNinos" name="cantNinos"  class="form-control"  type="number" placeholder="Niños" required>   
                    </div>   
                </div>
            </div> 
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group text-center">     
                    <label for="txtDepartamento" class="text-white">Departamento</label> 
                    <input id="txtDepartamento" name="departamento" class="form-control" type="text" placeholder="Departamento" required>                
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
            <img class="d-block w-100" src="img/1.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>Example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-success" href="#" role="button">Learn more</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/3.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-right">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-success" href="#" role="button">Browse gallery</a>
                    </p>
                </div>
            </div>
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
