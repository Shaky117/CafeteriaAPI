@extends('layouts.default')

@section('content')
    <h1>Pedidos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{$pedido->fecha}}</td>
                    <td>{{$pedido->total}}</td>
                    <td>{{$estadosPedido[$pedido->idEstadoPedido]}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection