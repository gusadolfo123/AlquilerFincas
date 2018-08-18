<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Alquiler Fincas') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
                
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/jquery-ui.multidatespicker.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/myStyles.css') }}" rel="stylesheet">
        

    </head>
    <!-- <body class="myBody my-4 example"> -->
    <body>

        <div id="app" class="container">
        
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <!-- <a class="navbar-brand" href="#">{{ config('app.name', 'Alquiler Fincas') }}</a> -->
                <!-- <img src="img/loguito.png" width="150" class="d-inline-block align-top myImages" alt=""> -->
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mt-md-0 mt-4 py-3 text-center">
                    <img src="img/loguito.png"  class="d-inline-block align-top myImages mw-100" alt="">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">¿Quienes Somos?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nuestras Fincas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Eventos Empresariales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                    </ul>
                    
                    <div class="form-inline my-2 my-lg-0">
                        <a href="https://www.facebook.com/Alquilamosfinks/" class="fa fa-facebook"></a>
                        <a href="https://twitter.com/Alquilamosfinks" class="fa fa-twitter"></a>
                        <a href="https://www.instagram.com/alquilamosfincas01/" class="fa fa-instagram"></a>
                        <a href="https://wa.me/573143151172" class="fa fa-whatsapp"></a>                        
                    </div>
                </div>
            </nav>

            <main>                
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="page-footer font-small blue bg-dark text-light border border-right-0 border-left-0 border-bottom-0 border-success">
                <!-- Footer Links -->
                <div class="container-fluid text-center text-md-left">
                
                    <!-- Grid row -->
                    <div class="row pt-4 pb-4">
                        <!-- Grid column -->
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mt-md-0 mt-4 py-3 text-center">
                            <img src="img/loguito.png"  class="d-inline-block align-top myImages mw-100" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-md-0 mt-4 py-3">
                            <i class="fas fa-clock"></i>  Horario de Atencion: <br> Lunes a Viernes 9:00 AM - 5:00 PM <br> Sábados 10:00 AM - 2:00 PM
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 mt-md-0 mt-4 py-3">
                            <i class="fas fa-mobile-alt"></i>  Celular:<br> 3043970363
                            <br />
                            <i class="fab fa-whatsapp-square"></i>  Whatsapp:<br> <a href="https://wa.me/573143151172">3043970363</a> - 24 H
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-md-0 mt-4 py-3 text-left">
                            <img src="img/certif.webp " width="75px" class="d-inline-block align-top float-left mr-1" alt="">
                            <span> Cada una de nuestras fincas, antes de ser publicada, pasa por un riguroso sistema de verificación de sus propietarios.</span>
                        </div>
                    </div>
                    <!-- Grid row -->
                </div>
                <!-- Footer Links -->

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3 bgFooter">© 2018 Copyright:
                <a href="https://AlquilamosFincas.com"> AlquilamosFincas.com</a>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->

        </div>
     
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>        
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.multidatespicker.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        
        <!-- <script>
            $(document).ready(function(){
                $('body').hide();
                $('body').fadeIn(2000);
            });
        </script> -->

        @yield('scripts')
        


    </body>
</html>
