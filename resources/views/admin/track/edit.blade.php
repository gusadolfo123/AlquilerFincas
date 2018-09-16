@extends('layouts.appAdmin')

@section('content')

<h1 class=" page-header text-center mt-3">Formulario de Modificacion</h1>

<div class="container">        
    <div class="row pb-4 justify-content-center">                              
        {!! Form::model($via, ['route' => ['tracks.update', $via->id], 'method' => 'PUT']) !!}
            @include('admin.track.partial.form')
        {!! Form::close() !!}                
    </div>        
</div>

@endsection

