@extends('layouts.appAdmin')

@section('content')

<h2 class="page-header text-center mt-3">Listado de Fincas</h2>

<div class="container">      
    <div class="row">        
            <div class="col-md-12 mb-2">
                Total: {{ $cantReg }}
                <a href="{{ route('farms.create') }}" class="btn btn-sm btn-primary pull-right" aria-label="Left Align">
                    Crear
                </a>                                
                
            </div>
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio Baja</th>
                    <th scope="col">Precio Media</th>
                    <th scope="col">Precio Alta</th>
                    <th scope="col">Max Personas</th>
                    <th scope="col">Departamento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
              
                    </tr>
                </thead>
                <tbody id="listFarms">
                    @foreach($fincas as $finca)
                        <tr>
                            <th scope="row">{{ $finca->id }}</th>
                            <td>{{ $finca->nombre }}</td>
                            <td>$ {{ number_format($finca->precio_Tbaja, 0) }}</td>
                            <td>$ {{ number_format($finca->precio_Tmedia, 0) }}</td>
                            <td>$ {{ number_format($finca->precio_Talta, 0) }}</td>                                                
                            <td>{{ $finca->max_personas }}</td>
                            <td>{{ $finca->departamento->descripcion }}</td>
                            <td>
                        
                                <a href="{{ route('farms.show', $finca->id) }}" class="dialog-window">
                                    <button type="button" class="btn btn-info btn-list" aria-label="Left Align">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                               <a href="{{ route('farms.edit', $finca->id) }}" class="dialog-window">
                                    <button type="button" class="btn btn-primary btn-list" aria-label="Left Align">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['farms.destroy', $finca->id]]) }}
                                <button class="btn btn-danger btn-list" aria-label="Left Align">
                                    <i class="fas fa-trash-alt"></i>
                                </button>                                
                                {{ Form::close() }}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $fincas->links() }}
    </div>
</div>


@endsection

