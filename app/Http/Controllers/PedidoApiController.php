<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PedidoApiController extends Controller
{
    public function getComidas() {
        $comidas = \App\Comida::all();
        return $comidas;
    } 

    public function getPedidosUsuario($idUsuario) {
        $pedidos =
            \App\Pedido::where('idUsuario','=',$idUsuario)
                ->get();
        return $pedidos;
    }
}