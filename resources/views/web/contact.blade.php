@extends('layouts.app')

@section('content')

<div class="row-fluid myBody">
    <section id="contact-form-section" class="form-content-wrap">
        <div class="container">
            <!-- <div class="row align-items-center justify-content-center"> -->
            <div class="row">
                <div class="col-lg-7 col-sm-12">
                    <div class="card border-success mb-3 my-5">
                        <div class="col-sm-12 pt-4">
                            <div class="item-content colBottomMargin">
                                <div class="item-info">                                    
                                    <h2 class="item-title text-center">Formulario de Contacto</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">								
                            <form id="contactForm" data-toggle="validator" action="{{ url('enviarMensaje') }}" method="POST" class="popup-form">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div id="msgContactSubmit" class="hidden"></div>                                            
                                    <div class="form-group col-sm-6">                                                
                                        <input name="fname" id="fname" placeholder="Tu nombre*" class="form-control" type="text" required> 
                                        <div class="input-group-icon"><i class="fa fa-user"></i></div>
                                    </div><!-- end form-group -->
                                    <div class="form-group col-sm-6">                                                
                                        <input name="email" id="email" placeholder="Tu E-mail*" pattern=".*@\w{2,}\.\w{2,}" class="form-control" type="email" required>
                                        <div class="input-group-icon"><i class="fa fa-envelope"></i></div>
                                    </div><!-- end form-group -->
                                    <div class="form-group col-sm-6">
                                        <input name="phone" id="phone" placeholder="Teléfono*" class="form-control" type="text" required>
                                        <div class="input-group-icon"><i class="fa fa-phone"></i></div> 
                                    </div><!-- end form-group -->
                                    <div class="form-group col-sm-6">
                                        <input name="subject" id="subject" placeholder="Asunto*" class="form-control" type="text" required>
                                        <div class="input-group-icon"><i class="fa fa-book"></i></div> 
                                    </div><!-- end form-group -->
                                    <div class="form-group col-sm-12">
                                        <textarea rows="3" name="message" id="message" placeholder="Escribe tu comentario aquí*" class="form-control "></textarea>
                                        <div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
                                    </div><!-- end form-group -->
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-sm-12 col-ms-12 mb-3">
                                        <span class="col-sm-12 col-md-6 ml-3">* Campos requeridos</span>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="form-group last col-sm-12 col-md-12 ml-3">
                                        <button type="submit" id="submitMessage" class="btn btn-custom"><i class='fa fa-envelope'></i> Enviar</button>
                                    </div><!-- end form-group -->	
                                </div>
                                
                            </form><!-- end form -->											
                        </div>
                    </div><!--End row -->
                </div><!--End col -->  
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="card border-success mt-5">
                        <div class="card-body">
                            <h2 class="item-title text-center">Mapa Ubicacion</h2>
                            
                            <p class="card-text">
                                {{-- <iframe class="col-lg-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.4834377794136!2d-74.10877738484268!3d4.506511996725554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3fa3cc9ef341e9%3A0xd2bb7295acb23945!2sCL+84+Sur+-+KR+4A+Este!5e0!3m2!1ses!2sco!4v1534635371957" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                                <iframe class="col-lg-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.0690046807745!2d-74.04104118588698!3d4.758021596544433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f858faa7ae7c1%3A0x8516874f666ead3!2sCra.+17b+%26+Cl.+181%2C+Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1537980390872" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </p>
                            <p class="text-center"><small>La atención es con cita previa</small></p>
                        </div>
                    </div>  
                    <!-- Grid row -->
                    <div class="row-fluid bg-dark text-light mb-3">
                        <div class="col-12 mt-md-0 pt-3">
                            <i class="fas fa-clock"></i>  <strong>Horario de Atencion:</strong><br> Lunes a Viernes 9:00 AM - 5:00 PM <br> Sábados 10:00 AM - 2:00 PM
                        </div>
                        <div class="col-12 mt-md-0 pt-3">
                            <div class="row pb-3">
                                <div class="col">
                                    <i class="fas fa-mobile-alt"></i>  <strong>Celular:</strong><br> 3043970363
                                </div>
                                <div class="col">
                                    <i class="fab fa-whatsapp-square"></i>  <strong>Whatsapp:</strong><br> <a href="https://wa.me/573143151172">3043970363</a> - 24 H        
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <!-- Grid row -->                  
                </div>     
            </div><!--End row -->
        </div><!--End container -->
    </section>
</div>

    @section('scripts')
    <script>        
        $(window).load(function(){   
                        
            $("#contactForm").on("submit", function(e) {

                var parametros =$(this).serialize();
                
                var fname = $("#fname").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var subject = $("#subject").val();
                var message = $("#message").val();

                if(fname === "" || email === "" || phone === "" || subject === "" || message === "")
                {
                    swal({  type: 'error',
                                title: 'Error',
                                text: 'Por Favor Diligencie todo el formulario'
                                });
                    return;
                }
                                    
                e.preventDefault(e);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('enviarMensaje') }}",
                    data: parametros,
                    dataType: "json",
                    success: function(data) {
                        swal({  position: 'top-end',
                                type: 'success',
                                title: 'Se envio el correo Exitosamente, Nos comunicaremos lo mas pronto posible'});

                        document.getElementById("contactForm").reset();
                    },
                    error: function(data) {                        
                        swal({  type: 'error',
                                title: 'Error',
                                text: 'No fue Posible Enviar el Correo, Por Favor Comuniquese al 3043970363.'
                                });
                    }
                });
                   
            });
           
        });    

    </script>
    @endsection


@endsection