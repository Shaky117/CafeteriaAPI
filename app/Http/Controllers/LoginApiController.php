<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;

class LoginApiController extends Controller
{
    public function login(Request $request){
        $usuario = $request->input('usuario');
        $password = $request->input('password');

        $usuario = \App\User::where('email', '=', $usuario)->first();   
        
        if($usuario && Hash::check($password, $usuario->password)){
            $nuevoToken = new \App\Token;
            $nuevoToken->idUser= $usuario->id;
            $nuevoToken->token = substr(md5(microtime()), rand(0,26),20);
            $nuevoToken->save();
            $usuario["token"] = $nuevoToken;
            return $usuario;

        }

        $error = array();
        $error['exito'] = false;
        $error['mensaje'] = "Usuario o password no coinciden" ;
        return $error;
    }
}