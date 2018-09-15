@extends('layouts.appAdmin')

@section('content')

<h1 class=" page-header text-center mt-3">Formulario de Modificacion</h1>

<div class="container">        
        <div class="row pb-4 justify-content-center">
                <div class="row-fluid">
                        <a href="{{ url('farms/uploadImage', $finca->id ) }}" class="btn btn-sm btn-primary">Agregar Fotos</a>
                </div>                
                <div class="row text-center bg-dark pb-4 ml-1 mr-1 mt-3" id="imagePanel">
                        @foreach($finca->fotos as $foto)
                                <div class="col-md-2" id="img-{{ $foto->id }}">
                                        <a class="example-image-link thumbnail" href="{{ $foto->archivo }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                                                <div class="card bg-dark text-success mt-4">
                                                        <img class="card-img" src="{{ $foto->archivo }}" alt="Card image">
                                                </div>  
                                        </a>    
                                        <div class="row-fluid bg-light">
                                                Eliminar
                                                <button type="button" class="close bg-light" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true" onclick="eliminarImagen({{ $foto->id }}, '{{ route('farms.deleteImage') }}', 'img-{{ $foto->id }}');" class=" mr-1 ml-1">&times;</span>
                                                </button>  
                                        </div>
                                                                                        
                                </div>
                        @endforeach
                </div>

                {!! Form::model($finca, ['route' => ['farms.update', $finca->id], 'method' => 'PUT', 'files' => true]) !!}

                        @include('admin.farm.partial.form')

                {!! Form::close() !!}      
                
                
        </div>        
</div>

@endsection

