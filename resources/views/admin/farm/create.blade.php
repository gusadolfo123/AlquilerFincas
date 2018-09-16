@extends('layouts.appAdmin')

@section('content')

<h1 class=" page-header text-center mt-3">Formulario de Creacion</h1>

<div class="container">        
  <div class="row pb-4 justify-content-center">
    {!! Form::open(['route' => 'farms.store', 'files' => true]) !!}
      @include('admin.farm.partial.form')
    {!! Form::close() !!}
  </div>
</div>

@endsection

 @section('scripts')
 
  <script src="{{ asset('vendor/StringToSlug/jquery.stringToSlug.min.js') }}"></script>
  
  <script>
      $(document).ready(function(){
        $('#nombre').stringToSlug({
          callback: function(text){
            $('#slug').val(text);            
          }
        });        
      }); 
  </script>
 
@endsection