@extends('layouts.appAdmin')

@section('content')

<h1 class=" page-header text-center mt-3">Formulario de Creacion</h1>

<div class="container">        
  <div class="row pb-4 justify-content-center">
    {!! Form::open(['route' => 'departments.store']) !!}
      @include('admin.department.partial.form')
    {!! Form::close() !!}
  </div>
</div>

@endsection
