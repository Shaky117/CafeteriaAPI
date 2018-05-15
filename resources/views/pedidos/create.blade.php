@extends('layouts.default')
@section('content')
    <h1>Crear pedido</h1>
        <form method="POST" action="{{route('pedidos.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        <input id="txtCantidad" class="form-control" type="text" placeholder="#">
                    </div>
                    <div class="col-md-10">
                        <select id="slcComida" class="form-control">
                            @foreach($comidas as $comida)
                                <option precio="{{$comida->precio}}" idComida="{{$comida->id}}" value="{{$comida->id}}">{{$comida->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button id="btnAgregarElemento" class="btn btn-primary" type="button">+</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped" id="tblPedido">
                            <thead>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Concepto</th>
                                    <th>Valor unitario</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Total</th>
                                    <td id="cellTotal">0.00</td>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="hidden" name="hdTotal" id="hdTotal" value="0">
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Enviar pedido</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
@endsection

@section('customstyles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('customscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="/js/createpedido.js"></script>
@endsection