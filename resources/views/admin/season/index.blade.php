@extends('layouts.appAdmin')

@section('content')

<h2 class="page-header text-center mt-3">Temporadas</h2>

<div class="container">  
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a href="{{ route('seasons.high') }}" class="btn btn-sm btn-primary">Temporada Alta</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('seasons.half') }}" class="btn btn-sm btn-primary">Temporada Media</a>
        </li>  
    </ul>    
  
</div>

@endsection
