@extends('layouts.app')

@section('content')

    <div class="row-fluid">
        <!-- <div class="col-12 bg-primary py-3"> Fondo Azul -->
        <div class="col-12 bg-dark py-3 border border-right-0 border-left-0 border-top-0 border-success">        
            <div class="form-row align-items-end">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 two-fields">
                    <div class="form-group text-center">     
                        <label for="datePickerEntrada" class="text-white">Fechas</label> 
                        <div class="input-group">    
                            <input id="datePickerEntrada"  class="form-control" placeholder="Entrada" readonly="readonly">  
                            <input id="datePickerSalida" class="form-control" placeholder="Salida" readonly="readonly">
                        </div>      
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 two-fields">
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
                    <button type="submit" class="btn btn-success btn-lg btn-block btn-md hbutton">Buscar</button>
                </div>       
            </div>
        </div>  
    </div>  

    <!-- <div class="row pt-4 pb-2 ml-2 mr-2 myBody"> -->
    <div class="row-fluid myBody">
        <div class="container">           
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 mt-5">
                    <div class="card text-success mb-3">
                    <div class="card-header">Filtros</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="chkHabitaciones">Habitaciones</label>
                                    <input type="number" class="form-control" id="chkHabitaciones" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="chkBanios">Baños</label>
                                    <input type="number" class="form-control" id="chkBanios" value="1">
                                </div>

                                <hr />

                                <p class="card-text">Servicios:</p>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Jacuzi</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Piscina </label>
                                </div>

                                <hr />

                                <p class="card-text">Via:</p>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Melgar </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Cali</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio3">Boyaca</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio4">Medellin</label>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col">
                                        <i class="fas fa-trash"></i> <a href="#">Quitar Filtros</a>
                                    </div>
                                </div>
                                <hr />
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 mt-5 mb-5">
                    <div class="card text-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Resultado Busqueda: [100]</h5>
                        
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="card">
                                        <img class="card-img-top" src="img/1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="card">
                                        <img class="card-img-top" src="img/1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="card">
                                        <img class="card-img-top" src="img/1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-md-4 mt-4">
                                    <div class="card">
                                        <img class="card-img-top" src="img/1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="card">
                                        <img class="card-img-top" src="img/1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="card">
                                        <img class="card-img-top" src="img/1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
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
