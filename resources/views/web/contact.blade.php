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
                            <form id="contactForm" name="contactform" data-toggle="validator" class="popup-form">
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
                                        <button type="submit" id="submit" class="btn btn-custom"><i class='fa fa-envelope'></i> Enviar</button>
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
                                <iframe class="col-lg-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.4834377794136!2d-74.10877738484268!3d4.506511996725554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3fa3cc9ef341e9%3A0xd2bb7295acb23945!2sCL+84+Sur+-+KR+4A+Este!5e0!3m2!1ses!2sco!4v1534635371957" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </p>
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
        document.addEventListener("touchstart", function() {}, false);
        (function($) {
            "use strict";
            $(function() {
                var randNumber_1 = parseInt(Math.ceil(Math.random() * 15), 10);
                var randNumber_2 = parseInt(Math.ceil(Math.random() * 15), 10);
                humanCheckCaptcha(randNumber_1, randNumber_2);
            });

            function humanCheckCaptcha(randNumber_1, randNumber_2) {
                $("#humanCheckCaptchaBox").html("Solve The Math ");
                $("#firstDigit").html('<input name="mathfirstnum" id="mathfirstnum" class="form-control" type="text" value="' + randNumber_1 + '" readonly>');
                $("#secondDigit").html('<input name="mathsecondnum" id="mathsecondnum" class="form-control" type="text" value="' + randNumber_2 + '" readonly>');
            }
            $("#contactForm").validator().on("submit", function(event) {
                var parametros =$(this).serialize();
                if (event.isDefaultPrevented()) {
                    formError();
                    submitContactFormActionMSG(false, "Completa el Formulario Correctamente!");
                } else {
                    var fname = $("#fname").val();
                    var email = $("#email").val();
                    var phone = $("#phone").val();
                    var subject = $("#subject").val();
                    var message = $("#message").val();
                    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
                    if (filter.test(phone)) {
                        var validphone = 1;
                    } else {
                        var validphone = 0;
                    }
                    if (validphone > 0) {
                        event.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "process.php",
                            data: parametros,
                            success: function(text) {
                                if (text == "success") {
                                    contactFormSuccess();
                                } else {
                                    formError();
                                    submitContactFormActionMSG(false, text);
                                }
                            }
                        });
                    } else {
                        submitContactFormActionMSG(false, "Ingresa un número de teléfono");
                        return false;
                    }
                }
            });

            function submitContactFormActionMSG(valid, msg) {
                if (valid) {
                    var msgClasses = "h3 text-center text-success col-md-12";
                } else {
                    var msgClasses = "h3 text-center text-danger col-md-12";
                }
                $("#msgContactSubmit").removeClass().addClass(msgClasses).text(msg);
                return false;
            }

            function contactFormSuccess() {
                submitContactFormActionMSG(true, "Los datos han sido enviados con éxito!");
            }
            function formError() {
                $(".help-block.with-errors").removeClass('hidden');
            }
        })(jQuery);    

    </script>
    @endsection


@endsection