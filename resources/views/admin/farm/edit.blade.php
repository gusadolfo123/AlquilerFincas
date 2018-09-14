@extends('layouts.appAdmin')

@section('content')

<h1 class=" page-header text-center mt-3">Formulario de Modificacion</h1>

<div class="container">        
        <div class="row pb-4 justify-content-center">
                {!! Form::model($finca, ['route' => ['farms.update', '$finca->id'], 'method' => 'PUT']) !!}

                        @include('admin.farm.partial.form')

                {!! Form::close() !!}
        </div>
</div>

@endsection

