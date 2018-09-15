@extends('layouts.appAdmin')

@section('content')   
    
        <div class="col-sm-12">
            <h5 class="card-title pt-4 text-center">Imagenes</h5>
            {!! Form::open(['route'=> 'farms.upload', 'method' => 'POST', 'files'=>'true', 'id' => 'myDropzone' , 'class' => 'dropzone']) !!}
                
                {!! Form::hidden('id', $id, null) !!}
                
                <div class="dz-message" style="height:200px;">
                Arrastre o Seleccione las Imagenes en esta zona
                </div>
                <div class="dropzone-previews"></div>                
            {!! Form::close() !!}
            <button type="submit" id="enviarDatos" class="btn btn-primary mt-4">Enviar</button>

            <a href="{{ route('farms.edit', $id) }}" class="btn btn-primary mt-4">               
                Regresar
            </a>

        </div>
   
@endsection

 @section('scripts')
    <script src="{{ asset('vendor/dropzone/dropzone.js') }}"></script>

    <script>
        $(document).ready(function(){
            Dropzone.options.myDropzone = {                
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 6,
                maxFiles: 6,
                maxFilesize: 4,
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                init: function() {
                    dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
                    var submitBtn = document.querySelector("#enviarDatos");
                    
                    submitBtn.addEventListener("click", function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        dzClosure.processQueue();
                    });
                 
                    this.on("success", function(file, responseText) {
                        swal({  type: 'success',
                                title: 'Ok',
                                text: 'Imagenes Subidas Correctamente'
                                });
                        dzClosure.processQueue.bind(dzClosure)                        
                    });
                
                    this.on("complete", function(file) {
                        dzClosure.removeFile(file);
                    });

                   
                }
            }
        });      
    </script>


 @endsection