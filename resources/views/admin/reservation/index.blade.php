@extends('layouts.appAdmin')

@section('content')

<h2 class="page-header text-center mt-3">Listado de Reservaciones</h2>

<div class="container">      
    <div class="row">        
            <div class="col-md-12 mb-2">
                Total: {{ $cantReg }}
                <a href="{{ route('reservations.create') }}" class="btn btn-sm btn-primary pull-right" aria-label="Left Align">
                    Crear
                </a>                                
                
            </div>
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nomb. Finca</th>
                        <th scope="col">Fec. Reserva</th>
                        <th scope="col">Fec. Ingreso</th>
                        <th scope="col">Fec. Salida</th>
                        <th scope="col">PreCotizacion</th>                        
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>              
                    </tr>
                </thead>
                <tbody id="listReservations">
                    @foreach($reservas as $reserva)
                        <tr>
                            <th scope="row">{{ $reserva->id }}</th>
                            <td>{{ $reserva->finca->nombre }}</td>
                            <td>{{ $reserva->fec_Reserva }}</td>
                            <td>{{ $reserva->fec_Ingreso }}</td>
                            <td>{{ $reserva->fec_Salida }}</td>                                                
                            <td>{{ $reserva->preCotizacion }}</td>
                            <td>{{ $reserva->estado }}</td>
                            <td>
                        
                                <a href="{{ route('reservations.show', $reserva->id) }}" class="dialog-window">
                                    <button type="button" class="btn btn-info btn-list" aria-label="Left Align">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                               <a href="{{ route('reservations.edit', $reserva->id) }}" class="dialog-window">
                                    <button type="button" class="btn btn-primary btn-list" aria-label="Left Align">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['reservations.destroy', $reserva->id]]) }}
                                <button class="btn btn-danger btn-list" aria-label="Left Align">
                                    <i class="fas fa-trash-alt"></i>
                                </button>                                
                                {{ Form::close() }}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $reservas->links() }}
    </div>
</div>


@endsection
