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
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/jquery-ui.multidatespicker.css') }}" rel="stylesheet" />
        

    </head>
    <body>

        <div id="app">
        
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <a class="navbar-brand" href="#">{{ config('app.name', 'Alquiler Fincas') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reservar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <button class="btn btn-primary my-2 my-sm-0" id="prueba" type="submit">Search</button>
                    </form>
                </div>
            </nav>

            <main class="py-4">
                <input id="datePickerEntrada" readonly="readonly">
                <input id="datePickerSalida" readonly="readonly">
                @yield('content')
            </main>

        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>        
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.multidatespicker.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        
        <script>
            $(function() {

                        $.datepicker.regional['es'] = { closeText: 'Cerrar',
                                                        prevText: '< Ant',
                                                        nextText: 'Sig >',
                                                        currentText: 'Hoy',
                                                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                                        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                                                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                                        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                                                        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                                                        weekHeader: 'Sm',
                                                        dateFormat: 'dd/mm/yy',
                                                        firstDay: 1,
                                                        isRTL: false,
                                                        showMonthAfterYear: false,
                                                        yearSuffix: ''
                        };
                        
                        $.datepicker.setDefaults($.datepicker.regional['es']);
                        
                        let date1 = new Date();
                        $("#datePickerEntrada").multiDatesPicker({
                            minDate: 0,                
                            maxPicks: 1,
                            onSelect:function(){
                                var date = $('#datePickerEntrada').multiDatesPicker('getDates');
                                if(date.length > 0)
                                {
                                    
                                    var day = date1.getDate();
                                    var monthIndex = date1.getMonth() + 1;
                                    var year = date1.getFullYear();
                                    
                                    var strDate = date[0].toString();
                                    let datePrueba = strDate.substring(3,5) + "/" + strDate.substr(0,2) + "/" + strDate.substr(6,7);
                                    
                                    var fecha1 = moment(date1).format('l');
                                    var fecha2 = moment(datePrueba).format('l');
                                    
                                    let date11 = new Date(fecha1);
                                    let date22 = new Date(fecha2);

                                    let  Dif = date22.getTime() - date11.getTime();
                                    let dias = Math.floor(Dif/(1000*24*60*60));

                                
                                    $('#datePickerSalida').datepicker('destroy');
                                    $("#datePickerSalida").multiDatesPicker({
                                        minDate: dias + 1,
                                    });
                                }
                                else
                                {
                                    var strDate = "0";
                                    $('#datePickerSalida').multiDatesPicker('resetDates', 'picked');
                                }
                                    
                            }
                        });
                        
                        $("#datePickerSalida").multiDatesPicker({
                            minDate: 0,
                            maxPicks: 1
                        });

                        $("#numPersonas").on("keyup",function(){
                            if($("#numPersonas").val() > 99)
                                alert("Solo es Permitido un Maximo de 2 Digitos");
                        });
                    
                    });
        </script>


    </body>
</html>
