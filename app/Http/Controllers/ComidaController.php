<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ComidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario = $request->user();
        if($usuario->idTipoUsuario == 1) {
            $comidas = \App\Comida::all();
            $argumentos = array();
            $exito = $request->input('exito');
            $borrado = $request->input('borrado');
            $argumentos["comidas"] = $comidas;
            $argumentos["exito"] = $exito;
            $argumentos["borrado"] = $borrado;
            return view("comidas.index", $argumentos);
        } else {
            return redirect()->route('index');
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $argumentos = array();
        return view('comidas.create', $argumentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->input('txtNombre');
        $precio = $request->input('txtPrecio');

        $nuevaComida = new \App\Comida;
        $nuevaComida->nombre = $nombre;
        $nuevaComida->precio = $precio;

        $respuesta = array();
        $respuesta["exito"] = false;
        if ($nuevaComida->save()) {
            $respuesta["exito"] = true;
        }

        return redirect()->route('comidas.index',$respuesta);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $comida = \App\Comida::find($id);
        $exito = $request->input('exito');
        
        $argumentos = array();
        $argumentos['comida'] = $comida;
        $argumentos['exito'] = $exito;

        return view('comidas.edit',$argumentos);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comida = \App\Comida::find($id);
        $comida->nombre = $request->input('txtNombre');
        $comida->precio = $request->input('txtPrecio');

        $respuesta = array();
        $respuesta["exito"] = false;

        if ($comida->save()) {
            $respuesta["exito"] = true;
        }
        $respuesta["comidas"] = $id;
        return redirect()->route('comidas.edit',$respuesta);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comida = \App\Comida::find($id);
        $resultado = array();
        $resultado["borrado"] = false;
        if($comida->delete()) {
            $resultado["borrado"] = true;
        }
        return redirect()->route('comidas.index',$resultado);
    }
}
