@extends('layouts.appAdmin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 my-2">
            <div class="card">
                <div class="card-header bg-success text-light">                    
                    <a href="{{ route('farms.edit', $finca->id) }}" class="btn btn-primary">Modificar</a>             
                    Detalle Finca: {{ $finca->nombre }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Informacion General</h5>

                    <div class="row justify-content-start">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label class="mb-0" for="exampleInputEmail1">Direccion</label>                        
                                    <small id="emailHelp" class="form-text text-muted mt-0">{{ $finca->direccion }}</small>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="mb-0" for="exampleInputEmail1">Via</label>                        
                                    <small id="emailHelp" class="form-text text-muted mt-0">{{ $finca->via->descripcion }}</small>
                                </div>                                
                            </div>                                                                                    
                        </div>                        
                    </div>                    
                    
                    <div class="row pt-4">
                        <div class="col-12 col-sm-4">
                            <label class="mb-0" for="exampleInputEmail1">Precio Temporada Baja</label>                        
                            <small id="emailHelp" class="form-text text-muted mt-0">$ {{ number_format($finca->precio_Tbaja, 0) }}</small>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label class="mb-0" for="exampleInputEmail1">Precio Temporada Media</label>                        
                            <small id="emailHelp" class="form-text text-muted mt-0">$ {{ number_format($finca->precio_Tmedia, 0) }}</small>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label class="mb-0" for="exampleInputEmail1">Precio Temporada Alta</label>                        
                            <small id="emailHelp" class="form-text text-muted mt-0">$ {{ number_format($finca->precio_Talta, 0) }}</small>
                        </div>
                    </div>

                    <h5 class="card-title pt-4">Capacidad y Servicios</h5>

                    <div class="row pt-4">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="row justify-content-end">
                                <div class="col-4">
                                    <span><i class="fas fa-users"></i> {{ $finca->max_personas }} Huespedes</span>
                                </div>
                                <div class="col-4">
                                    <span><i class="fas fa-bed"></i> {{ $finca->cant_habitaciones }} Habitaciones</span>
                                </div>
                                <div class="col-4">
                                    <span><i class="fas fa-bath"></i> {{ $finca->cant_banios }} Baños</span>
                                </div>
                            </div>                        
                        </div>
                    </div>                                        

                    <div class="row pt-4">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="row">
                                @if($finca->sn_jacuzi)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <i class="fas fa-hot-tub"></i> Jacuzi
                                    </div>
                                @endif
                                @if($finca->sn_piscina)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <i class="fas fa-swimming-pool"></i> Piscina
                                    </div>
                                @endif
                                @if($finca->sn_caballos)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <img src="{{ asset('img/horse.png') }}" class="horse" alt=""> Caballos
                                    </div>
                                @endif
                                @if($finca->sn_parqueadero)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <i class="fas fa-car"></i> Parqueadero
                                    </div>
                                @endif
                                @if($finca->sn_picnic)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <i class="fas fa-utensils"></i> Picnic
                                    </div>
                                @endif      
                            </div>                        
                        </div>
                    </div>
               
                    <h5 class="card-title pt-4">Descripcion</h5>

                    <div class="row">
                        <div class="col">
                            {!! $finca->descripcion !!}
                        </div>                        
                    </div>

                    <h5 class="card-title pt-4">Imagenes</h5>

                    <div class="row text-center bg-dark pb-4 ml-1 mr-1 mt-3">
                        @foreach($finca->fotos as $foto)
                            <div class="col-md-2">
                                <a class="example-image-link thumbnail" href="{{ $foto->archivo }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                                    <div class="card bg-dark text-success mt-4">
                                        <img class="card-img" src="{{ $foto->archivo }}" alt="Card image">
                                    </div>  
                                </a>                                                      
                            </div>
                        @endforeach
                    </div>

                </div>               
            </div>
        </div>
    </div>
</div>

@endsection
