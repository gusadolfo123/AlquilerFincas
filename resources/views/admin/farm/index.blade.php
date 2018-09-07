@extends('layouts.appAdmin')

@section('content')

<h1 class="page-header text-center mt-3">Listado de Fincas</h1>

<div class="container">
    <div class="row">
        <table class="table table-hover text-center">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio Baja</th>
                <th scope="col">Precio Alta</th>
                <th scope="col">Habitaciones</th>
                <th scope="col">Baños</th>
                <th scope="col">Personas</th>                
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="listFarms">
                @foreach($fincas as $finca)
                    <tr>
                        <th scope="row">{{ $finca->id }}</th>
                        <td>{{ $finca->nombre }}</td>
                        <td>$ {{ number_format($finca->precio_Tbaja, 0) }}</td>
                        <td>$ {{ number_format($finca->precio_Talta, 0) }}</td>
                        <td>{{ $finca->cant_habitaciones }}</td>
                        <td>{{ $finca->cant_banios }}</td>
                        <td>{{ $finca->max_personas }}</td>
                        <td>
                            <button onclick="" type="button" class="btn btn-primary" aria-label="Left Align">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <a href="{{ route('farms.show', $finca->id) }}" class="dialog-window">
                                <button type="button" class="btn btn-info" aria-label="Left Align">
                                    <i class="far fa-eye"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-danger" aria-label="Left Align">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $fincas->links() }}
    </div>
</div>


@endsection

