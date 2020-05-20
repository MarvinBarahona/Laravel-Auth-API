<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Sametsahindogan\ResponseObjectCreator\SuccessResult;

class TestController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarAlgo(){
        return $this->returnList();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearAlgo(){
        $campo = request('campo');
        Redis::set('test', $campo);

        return $this->returnList();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarAlgo(){
        Redis::del('test');

        return $this->returnList();
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    function returnList(){
        $list = Redis::get('test');

        return response()->json(new SuccessResult(['test' => $list]));
    }
}
