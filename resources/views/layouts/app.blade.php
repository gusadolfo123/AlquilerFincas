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
        <!-- <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" /> -->
        <!-- <link href="{{ asset('css/jquery-ui.multidatespicker.css') }}" rel="stylesheet" /> -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-datepicker3.css') }}" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <link href="{{ asset('css/myStyles.css') }}" rel="stylesheet">
        
        

    </head>
    <!-- <body class="myBody my-4 example"> -->
    <body class=" bg-primary">

        <div id="app" class="container">
        
            <nav class="navbar navbar-expand-lg navbar-dark bg-success centrar_texto">
                
                <!-- <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 mt-md-0 mt-4 py-3 text-center"> -->
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 text-center">
                    <a class="navbar-brand" href="#">{{ config('app.name', 'Alquiler Fincas') }}</a>
                    <!-- <img src="{{ asset('img/loguito.png') }}"  class="d-inline-block align-top myImages mw-100" alt=""> -->
                </div>
                
                <button class="navbar-toggler col-sm-12 color_toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/nosotros') }}">¿Quienes Somos?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/fincas') }}">Nuestras Fincas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/eventos') }}">Eventos Empresariales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
                        </li>
                    </ul>
                    
                    <div class="my-2 my-lg-0">
                        <a href="https://www.facebook.com/Alquilamosfinks/"  target="_blank" class="fa fa-facebook"></a>
                        <a href="https://twitter.com/Alquilamosfinks"  target="_blank" class="fa fa-twitter"></a>
                        <a href="https://www.instagram.com/alquilamosfincas01/"  target="_blank" class="fa fa-instagram"></a>
                        <a href="https://wa.me/573143151172"  target="_blank" class="fa fa-whatsapp"></a>                        
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
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mt-md-0 mt-4 py-3 text-center noneDisplay">
                            <img src="{{ asset('img/loguito.png') }}"  class="d-inline-block align-top myImages mw-100" alt="">
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-md-0 mt-4 py-3">
                            <i class="fas fa-clock"></i>  <strong>Horario de Atencion:</strong><br> Lunes a Viernes 9:00 AM - 5:00 PM <br> Sábados 10:00 AM - 2:00 PM
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 mt-md-0 mt-4 py-3">
                            <i class="fas fa-mobile-alt"></i>  <strong>Celular:</strong><br> 3043970363
                            <br />
                            <i class="fab fa-whatsapp-square"></i>  <strong>Whatsapp:</strong><br> <a href="https://wa.me/573143151172">3043970363</a> - 24 H
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-md-0 mt-4 py-3 text-left">
                            <img src="{{ asset('img/certif.webp') }}" width="75px" class="d-inline-block align-top float-left mr-1" alt="">
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
        <script src="{{ asset( 'js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/validator.min.js') }}"></script>
        <!-- FlexSlider -->
        <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
        <!-- DatePicker -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script src="{{ asset('js/myScripts.js') }}"></script>

        <script>


            

            $(function() {                                     

                $('#formSearch').on('submit', function(e){
                    
                    if($('#datePickerEntrada').val() == "") {
                        alert('Por favor llenar el campo de fecha Entrada');
                        e.preventDefault();
                        return;
                    }

                    if($('#datePickerSalida').val() == "") {
                        alert('Por favor llenar el campo de fecha Salida');
                        e.preventDefault();
                        return;
                    }
                });
                
                var dateNow = new Date();
                var now = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), 0, 0, 0, 0);
                
                var active_dates = [
                        @if(isset($fechas))
                            @foreach ($fechas as $fe)
                                "{{ date_format(date_create($fe->fecha), 'd/m/Y') }}", 
                            @endforeach
                        @endif
                    ];
                
                var tempAlta = [
                        @if(isset($fechas))
                            @foreach ($fechas as $fe)
                                "{{ date_format(date_create($fe->fecha), 'd/m/Y') }}", 
                            @endforeach
                        @endif
                    ];
            
                var fecReservadas = [
                            @if(isset($reservasConfirmadas))
                                @foreach ($reservasConfirmadas as $reserva)
                                    "{{ date_format(date_create($reserva->fec_Ingreso), 'd/m/Y') }}", 
                                @endforeach
                            @endif
                        ];

                var tempMedia = [
                            @if(isset($fecMedia))
                                @foreach ($fecMedia as $fecM)
                                    "{{ date_format(date_create($fecM->fecha), 'd/m/Y') }}", 
                                @endforeach
                            @endif
                        ];
               

                var checkin = $('#datePickerEntrada').datepicker({
                    language: "es",
                    weekStart: 1,                    
                    format: "dd/mm/yyyy",
                    orientation: "bottom auto",
                    minDate: 0,
                    beforeShowDay: function (date) {
                        if(date >= now)
                        {
                            var d = date;
                            var curr_date = d.getDate();
                            var curr_month = d.getMonth() + 1; //Months are zero based
                            var curr_year = d.getFullYear();
                            var formattedDate = (curr_date.toString().length == 1 ? "0" + curr_date : curr_date) + "/" + 
                                            (curr_month.toString().length == 1 ? "0" + curr_month : curr_month) + "/" + curr_year
                        

                            if ($.inArray(formattedDate, active_dates) != -1){
                                return {
                                    classes: 'activeClass',
                                };
                            }

                            if ($.inArray(formattedDate, fecReservadas) != -1){
                                return 'disabled';
                            }

                            if ($.inArray(formattedDate, tempAlta) != -1){
                                return {
                                    classes: 'activeClass',
                                };
                            }

                            if ($.inArray(formattedDate, tempMedia) != -1){
                                return {
                                    classes: 'activeClassMedia',
                                };
                            }
                            return;
                        }else{
                            return date >= now;
                        }
                    },
                    onRender: function (date) {
                        return date < now ? 'disabled' : '';
                    },
                    autoclose: true
                }).on('changeDate', function (ev) {
                    if (ev.date > checkout.datepicker("getDate") || !checkout.datepicker("getDate")) {
                        var newDate = new Date(ev.date);
                        newDate.setDate(newDate.getDate() + 1);
                        checkout.datepicker("update", newDate);
                    }
                    $('#datePickerSalida')[0].focus();
                });

                var checkout = $('#datePickerSalida').datepicker({
                    language: "es",
                    format: "dd/mm/yyyy",
                    orientation: "bottom auto",
                    beforeShowDay: function (date) {
                        if (!checkin.datepicker("getDate")) {
                            if(date >= new Date())
                            {
                                var d = date;
                                var curr_date = d.getDate();
                                var curr_month = d.getMonth() + 1; //Months are zero based
                                var curr_year = d.getFullYear();
                                var formattedDate = (curr_date.toString().length == 1 ? "0" + curr_date : curr_date) + "/" + 
                                            (curr_month.toString().length == 1 ? "0" + curr_month : curr_month) + "/" + curr_year
                                
                                if ($.inArray(formattedDate, active_dates) != -1){
                                    return {
                                        classes: 'activeClass',
                                    };
                                }


                                if ($.inArray(formattedDate, fecReservadas) != -1){
                                    return 'disabled';
                                }

                                if ($.inArray(formattedDate, tempAlta) != -1){
                                    return {
                                        classes: 'activeClass',
                                    };
                                }

                                if ($.inArray(formattedDate, tempMedia) != -1){
                                    return {
                                        classes: 'activeClassMedia',
                                    };
                                }

                                return;
                            }else{
                                return date >= new Date();
                            }
                        } else {
                            if(date > checkin.datepicker("getDate"))
                            {
                                var d = date;
                                var curr_date = d.getDate();
                                var curr_month = d.getMonth() + 1; //Months are zero based
                                var curr_year = d.getFullYear();
                                var formattedDate = curr_date + "/" + curr_month + "/" + curr_year

                                if ($.inArray(formattedDate, active_dates) != -1){
                                    return {
                                        classes: 'activeClass',
                                    };
                                }
                                return;
                            }else{
                                return date > checkin.datepicker("getDate");
                            }
                        }
                    },
                    autoclose: true
                });
                
                // $.datepicker.regional['es'] = { closeText: 'Cerrar',
                //                                 prevText: '< Ant',
                //                                 nextText: 'Sig >',
                //                                 currentText: 'Hoy',
                //                                 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                //                                 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                //                                 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                //                                 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                //                                 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                //                                 weekHeader: 'Sm',
                //                                 dateFormat: 'dd/mm/yy',
                //                                 firstDay: 1,
                //                                 isRTL: false,
                //                                 showMonthAfterYear: false,
                //                                 yearSuffix: ''
                // };
                
                // $.datepicker.setDefaults($.datepicker.regional['es']);
                
                // let date1 = new Date();
                // $("#datePickerEntrada").multiDatesPicker({
                //     minDate: 0,                
                //     maxPicks: 1,
                //     onSelect:function(){
                //         var date = $('#datePickerEntrada').multiDatesPicker('getDates');
                //         if(date.length > 0)
                //         {
                            
                //             var day = date1.getDate();
                //             var monthIndex = date1.getMonth() + 1;
                //             var year = date1.getFullYear();
                            
                //             var strDate = date[0].toString();
                //             let datePrueba = strDate.substring(3,5) + "/" + strDate.substr(0,2) + "/" + strDate.substr(6,7);
                            
                //             var fecha1 = moment(date1).format('l');
                //             var fecha2 = moment(datePrueba).format('l');
                            
                //             let date11 = new Date(fecha1);
                //             let date22 = new Date(fecha2);

                //             let  Dif = date22.getTime() - date11.getTime();
                //             let dias = Math.floor(Dif/(1000*24*60*60));

                        
                //             $('#datePickerSalida').datepicker('destroy');
                //             $("#datePickerSalida").multiDatesPicker({
                //                 minDate: dias + 1,
                //             });
                //         }
                //         else
                //         {
                //             var strDate = "0";
                //             $('#datePickerSalida').multiDatesPicker('resetDates', 'picked');
                //         }
                            
                //     }
                // });
                
                // $("#datePickerSalida").multiDatesPicker({
                //     minDate: 0,
                //     maxPicks: 1
                // });

                $("#numPersonas").on("keyup",function(){
                    if($("#numPersonas").val() > 99)
                        alert("Solo es Permitido un Maximo de 2 Digitos");
                });
                
            });
        </script>

        @yield('scripts')
        
    </body>
</html>
