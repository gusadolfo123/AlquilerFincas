@extends('layouts.app')

@section('content')

<div class="row-fluid">
    <div class="col-12 bg-primary py-3">        
        <div class="form-row align-items-end">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label for="datePickerEntrada" class="text-white">Fechas</label> 
                    <div class="input-group">    
                        <input id="datePickerEntrada"  class="form-control" placeholder="Entrada" readonly="readonly">  
                        <input id="datePickerSalida" class="form-control" placeholder="Salida" readonly="readonly">
                    </div>      
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 two-fields">
                <div class="form-group text-center">     
                    <label for="datePickerEntrada" class="text-white">Cantidad Huespedes</label> 
                    <div class="input-group">    
                        <input id="cantAdultos"  class="form-control" type="number" placeholder="Adultos">                
                        <input id="cantNinos"  class="form-control"  type="number" placeholder="Niños">   
                    </div>   
                </div>
            </div> 
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="form-group text-center">     
                    <label for="txtDepartamento" class="text-white">Departamento</label> 
                    <input id="txtDepartamento"  class="form-control" type="text" placeholder="Departamento">                
                </div>
            </div>      
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 pb-3">
                <button type="submit" class="btn btn-danger btn-lg btn-block btn-md hbutton">Buscar</button>
            </div>       
        </div>
    </div>  
</div>  

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide" src="img/1.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>Example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="img/2.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="img/3.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-right">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

    
    @section('scripts')
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
    @endsection

@endsection
