@extends('layouts.app')

@section('content')
<div class="row-fluid myBody">
    <div class=" container">
        <div class="row">
                
                <div class="col-lg-6 col-sm-6">
                    <div class="card border-success mb-3 my-5">
                        <div class="card-body text-success">
                        <div class="card-title"><p class="h2">Para Toda Clase De Eventos</p></div>
                            <p class="card-text">
                                <strong>En ALQUILAMOS FINCAS S.A.S</strong>, pensamos en todo. 
                                Contamoscon un portafolio diseñado para toda clase de eventos(Cumpleaños, despedidas de empresas, matrimonios etc.) 
                                Solo comunícate con nosotros o envía tu solicitud, y en la brevedad uno de nuestros asesores le indicara toda la información.
                                <hr />
                                <strong class="h5"><a href="{{ url('/contacto') }}">CONTACTENOS</a></strong>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <section class="slider mb-3 my-5">
                        <div id="slider" class="flexslider mb-0 fondo_transparente">
                            <ul class="slides">                                
                                @foreach($fotos as $foto)
                                        @if($foto->archivo != null)
                                        <li>
                                            <a href="{{ $foto->archivo }}" data-lightbox="example-set">
                                                <img src="{{ $foto->archivo }}"  style="height: 290px !important;" />
                                            </a>
                                        </li>
                                        @endif
                                @endforeach
                                
                            </ul>
                        </div>
                    </section>
                </div>
                
        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="slider mb-3">
                    
                    <div id="carousel" class="flexslider fondo_transparente">
                        <ul class="slides">
                            @foreach($fotos as $foto)
                                    @if($foto->archivo != null)
                                    <li>
                                        <img src="{{ $foto->archivo }}" />
                                    </li>
                                    @endif
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>   
@endsection

@section('scripts')
    <script>      
        $(window).load(function(){
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                itemMargin: 5,
                asNavFor: '#slider'
        });

        $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel",
                start: function(slider){
                $('body').removeClass('loading');
                }
            });
        });
    </script>
@endsection

