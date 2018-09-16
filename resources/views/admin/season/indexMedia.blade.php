@extends('layouts.appAdmin')

@section('content')

<h2 class="page-header text-center mt-3">Temporada Media</h2>

<div class="container">      
    <div class="row">   
        <button id="guardarFechas" class="btn btn-sm btn-primary mb-4 mt-2">Guardar</button>       
        <div id="mdp-demo"></div>
    </div>
</div>

@section('scripts')

    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.multidatespicker.js') }}"></script>

    <script>
        $(window).load(function(){
                        
            var tempAlta = [
                @if(isset($fechas))
                    @foreach ($fechas as $fe)
                        "{{ date_format(date_create($fe->fecha), 'd/m/Y') }}", 
                    @endforeach
                @endif
            ];
            
            document.querySelector('#guardarFechas').addEventListener('click', function(){ 

                //var data = $("#mdp-demo").multiDatesPicker('getDates');
                var data = $("#mdp-demo").val().split(',');
                var fechas = { 'fecha': [] };

                data.forEach(element => {                    
                    fechas.fecha.push(element.trim());
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('seasons.half') }}",
                    data: fechas,
                    dataType: "json",
                    success: function(data) {                        
                        swal({  position: 'top-end',
                                type: 'success',
                                title: 'Se actualizaron las fechas correctamente'});
                    },
                    error: function(data) {                        
                        swal({  type: 'error',
                                title: 'Error',
                                text: 'No fue posible actualizar las fechas correctamente.'
                                });
                    }
                });

            });

        
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
            
            var today = new Date();
            var y = today.getFullYear();     
            
            if(tempAlta.length > 0){
                $('#mdp-demo').multiDatesPicker({
                    addDates: tempAlta,
                    dateFormat: 'dd/mm/yy',
                    numberOfMonths: [3,4],
                    defaultDate: '1/1/'+y
                }); 
            }else{
                $('#mdp-demo').multiDatesPicker({                   
                    dateFormat: 'dd/mm/yy',
                    numberOfMonths: [3,4],
                    defaultDate: '1/1/'+y
                }); 
            }
         
        }); 
    </script> 
@endsection

@endsection
