@extends('layouts.appAdmin')

@section('content')

<h2 class="page-header text-center mt-3">Listado de Vias</h2>

<div class="container">      
    <div class="row">        
            <div class="col-md-12 mb-2">
                Total: {{ $cantReg }}
                
                <a href="{{ route('tracks.create') }}" class="btn btn-sm btn-primary pull-right" aria-label="Left Align">
                    Crear
                </a> 
                             
            </div>
            <table class="table table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripcion</th>                        
                        <th scope="col"></th>
                        <th scope="col"></th>                                  
                    </tr>
                </thead>
                <tbody id="listReservations">
                    @foreach($vias as $via)
                        <tr>
                            <th scope="row">{{ $via->id }}</th>
                            <td>{{ $via->descripcion }}</td>                                                     
                            <td>
                               <a href="{{ route('tracks.edit', $via->id) }}" class="dialog-window">
                                    <button type="button" class="btn btn-primary btn-list" aria-label="Left Align">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['tracks.destroy', $via->id]]) }}
                                <button class="btn btn-danger btn-list" aria-label="Left Align">
                                    <i class="fas fa-trash-alt"></i>
                                </button>                                
                                {{ Form::close() }}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $vias->links() }}
    </div>
</div>


@endsection
