@extends('layouts.default')
@section('content')
    <h1>Editar comida</h1>
    <a href="{{route('comidas.index')}}"><h3>Volver a comidas</h3></a>
    @if($exito)
        <p class="text-success">La comida se actualizó</p>
    @endif
    <form method="POST" action="{{ route('comidas.update',array('comidas'=>$comida->id)) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label class="form-label">Nombre:</label>
            <input class="form-control" type="text" name="txtNombre" value="{{$comida->nombre}}">
        </div>
        <div class="form-group">
            <label class="form-label">Precio:</label>
            <input class="form-control" type="text" name="txtPrecio" value="{{$comida->precio}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar comida</button>
        </div>
    </form>
    <form method="POST" action="{{route('comidas.destroy',array('comidas'=>$comida->id))}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger">Borrar comida</button>
    </form>
@endsection
