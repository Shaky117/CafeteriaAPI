@extends('layouts.default')
@section('content')
<h1>Comidas</h1>
@if($exito != null)
    @if($exito == 1)
        <p class="text-success">Se ha agregado una comida</p>
    @else
        <p class="text-danger">No se ha podido agregar comida</p>
    @endif
@endif 

@if($borrado != null)
    @if($borrado == 1)
        <p class="text-success">Se ha borrado una comida</p>
    @else
        <p  class="text-danger">No se ha podido borrar comida</p>
    @endif
@endif 

<a href="{{route('comidas.create')}}">
    <button class="btn btn-primary">Agregar comida</button>
</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comidas as $comida)
            <tr>
                <td>{{$comida->nombre}}</td>
                <td>{{$comida->precio}}</td>
                <td>
                    <a href="{{route('comidas.edit',$comida->id)}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection