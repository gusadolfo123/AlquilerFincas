

<div class="card-body" id="contFincas">
    <h5 class="card-title">Resultado Busqueda: [{{ $cantReg }}]</h5>

    <? $cont = 0; ?>

    <div class="row">
        @foreach($fincas as $finca)
            <div class="col-md-6">
                <a href="{{ route('farm', $finca->slug) }}">
                    <div class="card bg-dark text-success mt-4">
                        <img class="card-img" src="{{ $finca->fotos->first()->archivo }}" alt="Card image">
                        <div class="card-img-overlay p-0">
                            <h6 class="card-title">
                                <small class="bg-success text-light rounded pl-1 pr-1">Via: Bogota - Medellin Km 40  </small>
                            </h6>
                        </div>
                    </div>  
                </a>                                      
                    <div class="card-footer border-bottom border-success p-0 pl-2 pr-2">
                        <div class="row">
                            <div class="col-6 bg-dark text-light s1 ">
                                <small class="text-light"><i class="fas fa-dollar-sign"></i> {{ number_format($finca->precio_Tbaja, 0) }} Temp. Baja</small>
                            </div>
                            <div class="col-6 bg-primary text-light">
                                <small class="text-light"><i class="fas fa-users"></i> Personas: {{ $finca->max_personas }}</small>
                            </div>
                        </div>
                    </div>
                
            </div>
        @endforeach
    </div>
    
    <hr />

    @if(isset($data))
        {{ $fincas->appends(['post' => 'true'])->links() }}
    @else
        {{ $fincas->links() }}
    @endif
</div>  