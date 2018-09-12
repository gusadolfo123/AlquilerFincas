@extends('layouts.app')

@section('content')

<div class="row-fluid">
    <div class="col-12 bg-dark py-3 border border-right-0 border-left-0 border-top-0 border-success">        
        <form action="{{ url('/fincas') }}" method="POST" class="form-row align-items-end">    
            {{ csrf_field() }}
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label class="text-white">Fechas</label> 
                    <div class="input-group">
                        @if(isset($data))
                        <input id="datePickerEntrada" name="fecEntrada"  class="form-control" placeholder="Entrada" readonly="readonly" value="{{ $data['fecEntrada'] }}" required>  
                        <input id="datePickerSalida" name="fecSalida" class="form-control" placeholder="Salida" readonly="readonly" value="{{ $data['fecSalida'] }}" required>
                        @else
                        <input id="datePickerEntrada" name="fecEntrada"  class="form-control" placeholder="Entrada" readonly="readonly" required>  
                        <input id="datePickerSalida" name="fecSalida" class="form-control" placeholder="Salida" readonly="readonly" required>
                        @endif
                    </div>      
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label for="datePickerEntrada" class="text-white">Cantidad Huespedes</label> 
                    <div class="input-group">    
                        @if(isset($data))
                        <input id="cantHuespedes" name="cantHuespedes"  class="form-control" type="number" placeholder="Nro Huespedes" value="{{ $data['cantHuespedes'] }}" required>
                        @else
                        <input id="cantHuespedes" name="cantHuespedes"  class="form-control" type="number" placeholder="Nro Huespedes" required>
                        @endif
                    </div>   
                </div>
            </div> 
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group text-center">     
                    <label for="txtDepartamento" class="text-white">Departamento</label> 
                    @if(isset($data))
                    <input id="txtDepartamento" name="departamento" class="form-control" type="text" placeholder="Departamento" value="{{ $data['departamento'] }}" required>                
                    @else
                    <input id="txtDepartamento" name="departamento" class="form-control" type="text" placeholder="Departamento" required>          
                    @endif
                </div>
            </div>      
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 pb-3">
                <button type="submit" class="btn btn-success btn-lg btn-block btn-md hbutton">Buscar</button>
            </div>
        </form>
    </div>  
</div>

<div class="row-fluid myBody">
    <div class="container">    
    
        <div class="row-fluid pt-3">
            <div class="alert alert-success alert-dismissible mb-0 fade show" role="alert">
                <strong>Informacion de Busqueda:</strong> 
                <p>Tenga en cuenta que el precio puede variar segun el tipo de temporada identificadas en el calendario mediante los colores: 
                (<span style="background-color: rgb(233, 152, 152); color: white;"> Alta </span>,<span style="background-color: rgb(11, 163, 150); color:white;"> Media </span>).</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div> 

        
        <div class="row-fluid pt-3">
            <div class="alert alert-light mb-0 pb-0 fade show" role="alert">    
                <div class="row mb-2">
                    <div class="col-md-6 col-sm-6 col-12 centrar_texto2"><strong>Finca: {{ $finca->nombre }}</strong></div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="row text-center justify-content-end">
                            <div class="col-4">
                                <span><i class="fas fa-users"></i> {{ $finca->max_personas }}</span>
                            </div>
                            <div class="col-4">
                                <span><i class="fas fa-bed"></i> {{ $finca->cant_habitaciones }}</span>
                            </div>
                            <div class="col-4">
                                <span><i class="fas fa-bath"></i> {{ $finca->cant_banios }}</span>
                            </div>
                        </div>                        
                    </div>
                </div>                
            </div>
        </div> 

        <div class="row">
            <div class="col-lg-4 col-xl-3 col-md-12 col-sm-12 mt-3">
                <div class="card text-success mb-3">
                    <div class="card-body">
                        
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-sm-auto text-dark mb-2">
                                <div class="row justify-content-center">
                                    <div class="col-auto" id="sandbox-container">
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-auto form-group text-dark">
                                <div class="row justify-content-center pt-4">
                                    <div class="col-auto p-0">
                                        <div class="card text-dark bg-light">
                                            <div class="card-header"><strong>Precios x Noche</strong></div>
                                            <div class="card-body pt-0">
                                                <p class="card-tex pt-0">
                                                <h6 class="m-0 p-0"><strong>Temp. Baja:</strong> $ {{ number_format($finca->precio_Tbaja, 0) }}</h6>
                                                <h6 class="m-0 p-0"><strong>Temp. Media:</strong> $ {{ number_format($finca->precio_Tmedia, 0) }}</h6>
                                                <h6 class="m-0 p-0"><strong>Temp. Alta:</strong> $ {{ number_format($finca->precio_Talta, 0) }}</h6>                                                
                                                </p>
                                            </div>
                                        </div>  
                                    </div>
                                </div>                                
                            </div>
                        </div>

                        <div class="col-xs-12 two-fields">
                            <div class="form-group text-center">     
                                <label class="text-dark"><strong>Fechas</strong></label> 
                                <div class="input-group">
                                    @if(isset($data))
                                    <input id="dpEntrada" name="fecEntrada"  class="form-control letra" placeholder="Entrada" readonly="readonly" value="{{ $data['fecEntrada'] }}" required>  
                                    <input id="dpSalida" name="fecSalida" class="form-control letra" placeholder="Salida" readonly="readonly" value="{{ $data['fecSalida'] }}" required>
                                    @else
                                    <input id="dpEntrada" name="fecEntrada"  class="form-control letra" placeholder="Entrada" readonly="readonly" required>  
                                    <input id="dpSalida" name="fecSalida" class="form-control letra" placeholder="Salida" readonly="readonly" required>
                                    @endif
                                </div>      
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row text-dark">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 col-lg-12 d-none" id="tituloTotal">                                    
                                    <div class="row">
                                        <div class="col-12 text-left ml-0 mr-0 pl-0 pr-0">
                                            Valor x Noches
                                        </div>                                        
                                    </div>
                                </div>      
                                
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 col-lg-12 letra-h8">
                                    <div class="row">
                                        <div class="col-7 ml-0 mr-0 pl-0 pr-0">
                                            <p class="d-none" id="fecTempNormal"><span class="precioNoche">${{ number_format($finca->precio_Tbaja, 0) }}</span> x <span id="nroNochesN">0</span></p>
                                            <p class="d-none" id="fecTempMedia"><span class="precioNoche">${{ number_format($finca->precio_Tmedia, 0) }}</span> x <span id="nroNochesM">0</span></p>
                                            <p class="d-none" id="fecTempAlta"><span class="precioNoche">${{ number_format($finca->precio_Talta, 0) }}</span> x <span id="nroNochesA">0</span></p>
                                        </div>
                                        <div class="col-5 text-right ml-0 mr-0 pl-0 pr-0">
                                            <p id="totalNochesTempNormal" class="d-none">0</p>
                                            <p id="totalNochesTempMedia" class="d-none">0</p>
                                            <p id="totalNochesTempAlta" class="d-none">0</p>
                                        </div>
                                    </div>
                                </div>                                                             
                                
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 col-lg-12 d-none" id="idTotal">
                                   <div class="row">
                                        <div class="col-5 ml-0 mr-0 pl-0 pr-0">
                                            <p>Total:</p>
                                        </div>
                                        <div class="col-7 text-right ml-0 mr-0 pl-0 pr-0">
                                            <p id="totalCotizacion">$0</p>
                                        </div>
                                    </div>
                                </div>                                
                            </div>  

                            <div class="row">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success p-2 col-12 d-none" id="btnConfirmar" data-toggle="modal" data-target="#exampleModalCenter">
                                    Confirmar
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xl-9 col-md-12 col-sm-12 mt-3">
                <section class="slider">
                    <div id="slider" class="flexslider mb-2 fondo_transparente ">
                        <ul class="slides">
                            @foreach($finca->fotos as $foto)
                                <li>
                                    <img src="{{ $foto->archivo }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider fondo_transparente d-none d-sm-block mb-0">
                        <ul class="slides">
                            @foreach($finca->fotos as $foto)
                                <li>
                                    <img src="{{ $foto->archivo }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
                
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Descripcion</div>
                            <div class="card-body">
                                <p class="card-text">{!! $finca->descripcion !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Servicios</div>
                            <div class="card-body">
                                <p class="card-text">
                                    <div class="row">
                                        
                                            @if($finca->sn_jacuzi)
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <i class="fas fa-hot-tub"></i> Jacuzi
                                                </div>
                                            @endif
                                            @if($finca->sn_piscina)
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <i class="fas fa-swimming-pool"></i> Piscina
                                                </div>
                                            @endif
                                            @if($finca->sn_caballos)
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <img src="{{ asset('img/horse.png') }}" class="horse" alt=""> Caballos
                                                </div>
                                            @endif
                                            @if($finca->sn_parqueadero)
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <i class="fas fa-car"></i> Parqueadero
                                                </div>
                                            @endif
                                            @if($finca->sn_picnic)
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <i class="fas fa-utensils"></i> Picnic
                                                </div>
                                            @endif                                           
                                        
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Terminos y Condiciones</div>
                            <div class="card-body">
                                <p class="card-text">{!! $finca->descripcion !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-2">
                <h5 class="modal-title pl-3" id="exampleModalLongTitle">Confirmar Pre-Reserva Finca: {{ $finca->nombre }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-body pt-2" action="{{ url('enviarCotizacion') }}" id="enviarCotizacion" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6 two-fields">
                        <div class="form-group text-center">     
                            <label class="text-dark"><strong>Fechas</strong></label> 
                            <div class="input-group">
                                @if(isset($data))
                                <input id="dpEntrada" name="fecEntrada"  class="form-control letra" placeholder="Entrada" readonly="readonly" value="{{ $data['fecEntrada'] }}" required>  
                                <input id="dpSalida" name="fecSalida" class="form-control letra" placeholder="Salida" readonly="readonly" value="{{ $data['fecSalida'] }}" required>
                                @else
                                <input id="dpEntrada" name="fecEntrada"  class="form-control letra" placeholder="Entrada" readonly="readonly" required>  
                                <input id="dpSalida" name="fecSalida" class="form-control letra" placeholder="Salida" readonly="readonly" required>
                                @endif
                            </div>      
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group text-center">     
                            <label class="text-dark"><strong>Huespedes</strong></label> 
                            <div class="input-group">                                
                                @if(isset($data))
                                <input id="cantHuespedes" name="cantHuespedes"  class="form-control" type="number" placeholder="Nro Huespedes" value="{{ $data['cantHuespedes'] }}" required>
                                @else
                                <input id="cantHuespedes" name="cantHuespedes"  class="form-control" type="number" placeholder="Nro Huespedes" required>
                                @endif                     
                            </div>      
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group text-center">     
                            <label class="text-dark"><strong>Nombre Completo</strong></label> 
                            <div class="input-group">
                                <input type="text" id="nombreC" name="nombreC" class="form-control letra" required>  
                            </div>      
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group text-center">     
                            <label class="text-dark"><strong>Correo</strong></label> 
                            <div class="input-group">
                                <input id="correo" type="email" name="correo" class="form-control" required>                          
                            </div>      
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group text-center">     
                            <label class="text-dark"><strong>Telefono 1</strong></label> 
                            <div class="input-group">
                                <input type="number" id="tel1" name="tel1" class="form-control letra" required>  
                            </div>      
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group text-center">     
                            <label class="text-dark"><strong>Telefono 2</strong></label> 
                            <div class="input-group">
                                <input id="tel2" type="number" name="tel2"  class="form-control" required>                          
                            </div>      
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group text-center">     
                            <label class="text-dark"><strong>Comentarios</strong></label> 
                            <div class="input-group">
                                <textarea type="text" id="comentarios" name="comentarios" class="form-control letra"></textarea>
                            </div>      
                        </div>
                    </div>           
                </div>

                Una ves enviado el presente formulario, en los proximos minutos nos pondremos en contacto 
                para indicarle el proceso a seguir.      
                <div class="modal-footer mt-2">
                    <button type="submit" id="enviarForm" class="btn btn-primary">Enviar</button>
                </div>
            </form>  
        </div>
    </div>
</div>


@section('scripts')
    <script>      
        var selectDates = [
                        @if(isset($data))
                            "{{ $data['fecEntrada'] }}", 
                            "{{ $data['fecSalida'] }}",
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

        $(window).load(function(){
            
            var dateNow = new Date();
            var now = new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDate(), 0, 0, 0, 0);
            
            $("#enviarCotizacion").on("submit", function(e) {
                
                $.ajaxSetup({
                    header: $('meta[name="_token"]').attr("content")
                });

                e.preventDefault(e);
                
                $.ajax({
                    type: "GET",
                    url: "{{ route('enviarCotizacion') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(data) {
                        $("#exampleModalCenter .close").click();
                        swal({  position: 'top-end',
                                type: 'success',
                                title: 'Se envio el correo de reserva Exitosamente, En Breve nos estaremos comunicando con usted.'});
                    },
                    error: function(data) {                        
                        swal({  type: 'error',
                                title: 'Error',
                                text: 'No fue Posible Enviar el Correo, Por Favor Comuniquese al 3043970363.'
                                });
                    }
                });
            });
            
            $('.modal-content').resizable({
                minHeight: 300,
                minWidth: 300
            });
            
            $('.modal-dialog').draggable({
                handle: ".modal-header"
            });

            $('#sandbox-container div').datepicker({   
                language: "es",
                weekStart: 1,                    
                format: "dd/mm/yyyy",
                orientation: "bottom auto",
                minDate: 0,                
                multidate: 2,                
                beforeShowDay: function (date) {
                    if(date >= now)
                    {
                        var d = date;
                        var curr_date = d.getDate();
                        var curr_month = d.getMonth() + 1; //Months are zero based
                        var curr_year = d.getFullYear();
                        var formattedDate = (curr_date.toString().length == 1 ? "0" + curr_date : curr_date) + "/" + 
                                            (curr_month.toString().length == 1 ? "0" + curr_month : curr_month) + "/" + curr_year
                        
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
                }                               
            })
            .datepicker("setDate",selectDates)
            .on('changeDate', function (ev) {
                fnCalcValFecha();
            });

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

            fnCalcValFecha();
        });

        function fnCalcValFecha(){

                var dataSel = $('#sandbox-container div').data().datepicker.dates;
                
                if(dataSel.length === 1)
                {                    
                    var d1 = dataSel[0];
                    var curr_date = d1.getDate() + 1;
                    var curr_month = d1.getMonth() + 1; //Months are zero based
                    var curr_year = d1.getFullYear();
                    var formattedDate1 = (curr_date.toString().length == 1 ? "0" + curr_date : curr_date) + "/" + 
                                         (curr_month.toString().length == 1 ? "0" + curr_month : curr_month) + "/" + curr_year;

                    $("#dpEntrada").val(formattedDate1);
                    $("#dpSalida").val("");                    
                    
                    $('#fecTempAlta').addClass('d-none');
                    $('#totalNochesTempAlta').addClass('d-none');

                    $('#fecTempMedia').addClass('d-none');
                    $('#totalNochesTempMedia').addClass('d-none');

                    $('#fecTempNormal').addClass('d-none');
                    $('#totalNochesTempNormal').addClass('d-none');

                    $('#idTotal').addClass('d-none');
                    $('#tituloTotal').addClass('d-none');
                    $('#btnConfirmar').addClass('d-none');

                }
                    
                
                if(dataSel.length > 1)
                {
                    
                    var d1 = dataSel[0];
                    var curr_date1 = d1.getDate() + 1;
                    var curr_month1 = d1.getMonth() + 1; //Months are zero based
                    var curr_year1 = d1.getFullYear();
                    var formattedDate1 = (curr_date1.toString().length == 1 ? "0" + curr_date1 : curr_date1) + "/" + 
                                         (curr_month1.toString().length == 1 ? "0" + curr_month1 : curr_month1) + "/" + 
                                         curr_year1;
                    
                    $("#dpEntrada").val(formattedDate1);

                    var d2 = dataSel[1];
                    var curr_date2 = d2.getDate() + 1;
                    var curr_month2 = d2.getMonth() + 1; //Months are zero based
                    var curr_year2 = d2.getFullYear();
                    var formattedDate2 = (curr_date2.toString().length == 1 ? "0" + curr_date2 : curr_date2) + "/" + 
                                         (curr_month2.toString().length == 1 ? "0" + curr_month2 : curr_month2) + "/" + 
                                         curr_year2;
                    
                    if(d2 < d1)
                    {
                        $("#dpEntrada").val(formattedDate2);
                        $("#dpSalida").val(formattedDate1);
                                                
                        var timeDiff = d2 - d1;
                        var daysDiff = Math.abs(Math.floor(timeDiff / (1000 * 60 * 60 * 24)));

                        $("#nroNoches").html(daysDiff);
                        
                        var diasTempAlta = 0, diasTempMedia = 0, valTotal = 0;
                   

                        tempAlta.forEach(element => {
                            
                            let strDate = element.toString();
                            let datePrueba = strDate.substring(3,5) + "/" + strDate.substr(0,2) + "/" + strDate.substr(6,7);
                            let fec = new Date(strDate.substr(6,7), strDate.substring(3,5) - 1, strDate.substr(0,2));
                            
                            if(fec <= d1 && fec >= d2)
                                diasTempAlta++;
                        });

                        tempMedia.forEach(element => {
                            
                            let strDate = element.toString();
                            let datePrueba = strDate.substring(3,5) + "/" + strDate.substr(0,2) + "/" + strDate.substr(6,7);
                            let fec = new Date(strDate.substr(6,7), strDate.substring(3,5) - 1, strDate.substr(0,2));
                            
                            if(fec <= d1 && fec >= d2)
                                diasTempMedia++;

                        });
                        
                        var diasTempNormal = daysDiff - (diasTempAlta + diasTempMedia);
                        
                        if(diasTempAlta > 0){
                            $('#fecTempAlta').removeClass('d-none');
                            $('#totalNochesTempAlta').removeClass('d-none');
                            $('#nroNochesA').html(diasTempAlta);

                            let vAlta = parseFloat({{ $finca->precio_Talta }}).toFixed(2);
                            let valorTotal = diasTempAlta * vAlta;
                            valTotal = valorTotal;

                            $('#totalNochesTempAlta').html(valorTotal.toLocaleString());                            
                        }

                        if(diasTempMedia > 0){
                            $('#fecTempMedia').removeClass('d-none');
                            $('#totalNochesTempMedia').removeClass('d-none');
                            $('#nroNochesM').html(diasTempMedia);

                            let vMedia = parseFloat({{ $finca->precio_Tmedia }}).toFixed(2);
                            let valorTotal = diasTempMedia * vMedia;
                            valTotal = valTotal + valorTotal;

                            $('#totalNochesTempMedia').html(valorTotal.toLocaleString());
                        }

                        if(diasTempNormal > 0){

                            $('#fecTempNormal').removeClass('d-none');
                            $('#totalNochesTempNormal').removeClass('d-none');
                            $('#nroNochesN').html(diasTempNormal);

                            let vNormal = parseFloat({{ $finca->precio_Tbaja }}).toFixed(2);
                            let valorTotal = diasTempNormal * vNormal;
                            valTotal = valTotal +  valorTotal;

                            $('#totalNochesTempNormal').html(valorTotal.toLocaleString());
                        }

                        $('#idTotal').removeClass('d-none');
                        $('#btnConfirmar').removeClass('d-none');
                        $('#tituloTotal').removeClass('d-none');
                        $('#totalCotizacion').html(valTotal.toLocaleString());
                        
                        
                    }else{

                        $("#dpEntrada").val(formattedDate1);
                        $("#dpSalida").val(formattedDate2);

                        var timeDiff = d1 - d2;
                        var daysDiff = Math.abs(Math.floor(timeDiff / (1000 * 60 * 60 * 24)));

                        $("#nroNoches").html(daysDiff);
                        
                        var diasTempAlta = 0, diasTempMedia = 0, valTotal = 0;
                   
                        tempAlta.forEach(element => {
                            
                            let strDate = element.toString();
                            let datePrueba = strDate.substring(3,5) + "/" + strDate.substr(0,2) + "/" + strDate.substr(6,7);
                            let fec = new Date(strDate.substr(6,7), strDate.substring(3,5) - 1, strDate.substr(0,2));
                            
                            if(fec <= d2 && fec >= d1)
                                diasTempAlta++;
                        });

                        tempMedia.forEach(element => {
                            
                            let strDate = element.toString();
                            let datePrueba = strDate.substring(3,5) + "/" + strDate.substr(0,2) + "/" + strDate.substr(6,7);
                            let fec = new Date(strDate.substr(6,7), strDate.substring(3,5) - 1, strDate.substr(0,2));
                            
                            if(fec <= d2 && fec >= d1)
                                diasTempMedia++;

                        });
                        
                        var diasTempNormal = daysDiff - (diasTempAlta + diasTempMedia);
                        
                        if(diasTempAlta > 0){
                            $('#fecTempAlta').removeClass('d-none');
                            $('#totalNochesTempAlta').removeClass('d-none');
                            $('#nroNochesA').html(diasTempAlta);

                            let vAlta = parseFloat({{ $finca->precio_Talta }}).toFixed(2);
                            let valorTotal = diasTempAlta * vAlta;
                            valTotal = valorTotal;

                            $('#totalNochesTempAlta').html(valorTotal.toLocaleString());                            
                        }

                        if(diasTempMedia > 0){
                            $('#fecTempMedia').removeClass('d-none');
                            $('#totalNochesTempMedia').removeClass('d-none');
                            $('#nroNochesM').html(diasTempMedia);

                            let vMedia = parseFloat({{ $finca->precio_Tmedia }}).toFixed(2);
                            let valorTotal = diasTempMedia * vMedia;
                            valTotal = valTotal + valorTotal;

                            $('#totalNochesTempMedia').html(valorTotal.toLocaleString());
                        }

                        if(diasTempNormal > 0){

                            $('#fecTempNormal').removeClass('d-none');
                            $('#totalNochesTempNormal').removeClass('d-none');
                            $('#nroNochesN').html(diasTempNormal);

                            let vNormal = parseFloat({{ $finca->precio_Tbaja }}).toFixed(2);
                            let valorTotal = diasTempNormal * vNormal;
                            valTotal = valTotal +  valorTotal;

                            $('#totalNochesTempNormal').html(valorTotal.toLocaleString());
                        }

                        $('#idTotal').removeClass('d-none');
                        $('#btnConfirmar').removeClass('d-none');
                        $('#tituloTotal').removeClass('d-none');
                        $('#totalCotizacion').html(valTotal.toLocaleString());
                        
                     
                    }                      
                }
            }
    </script>
@endsection

@endsection


