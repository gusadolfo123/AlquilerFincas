@extends('layouts.appAdmin')

@section('content')

<h2 class="page-header text-center mt-3">Listado de Clientes</h2>

<div class="container">      
    <div class="row">        
            <div class="col-md-12 mb-2">
                Total: {{ $cantReg }}
                
                <a href="{{ route('customers.create') }}" class="btn btn-sm btn-primary pull-right" aria-label="Left Align">
                    Crear
                </a> 
                             
            </div>
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="listReservations">
                    @foreach($clientes as $cliente)
                        <tr>
                            <th scope="row">{{ $cliente->id }}</th>
                            <td>{{ $cliente->nombre }}</td>                                                     
                            <td>{{ $cliente->email }}</td>     
                            <td>                        
                                <a href="{{ route('customers.show', $cliente->id) }}" class="dialog-window">
                                    <button type="button" class="btn btn-info btn-list" aria-label="Left Align">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </a>
                            </td>                                                
                            <td>
                               <a href="{{ route('customers.edit', $cliente->id) }}" class="dialog-window">
                                    <button type="button" class="btn btn-primary btn-list" aria-label="Left Align">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['customers.destroy', $cliente->id]]) }}
                                <button class="btn btn-danger btn-list" aria-label="Left Align">
                                    <i class="fas fa-trash-alt"></i>
                                </button>                                
                                {{ Form::close() }}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $clientes->links() }}
    </div>
</div>


@endsection
