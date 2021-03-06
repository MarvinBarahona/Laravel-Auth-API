<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sametsahindogan\ResponseObjectCreator\SuccessResult;

class CheckController extends Controller
{
    public function permiso(){
        $permiso = request('permiso');

        return response()->json(new SuccessResult([
            'usuario' => Auth::user()->name,
            'permiso' => $permiso,
            'otorgado' => $permiso ? Auth::user()->can($permiso) : false
        ]));
    }

    public function rol(){
        $rol = request('rol');

        return response()->json(new SuccessResult([
            'usuario' => Auth::user()->name,
            'rol' => $rol,
            'otorgado' => $rol ? Auth::user()->hasRole($rol) : false
        ]));
    }
}
