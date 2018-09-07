@extends('layouts.appAdmin')

@section('content')

<h1 class="page-header text-center mt-3">Detalle Finca: {{ $finca->nombre }}</h1>
<div class="container">

    <div class="row">
        <div class="col-md-12 my-2">
            <div class="card text-center">
                <div class="card-header bg-success text-light">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center bg-dark pb-4">
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

@endsection
