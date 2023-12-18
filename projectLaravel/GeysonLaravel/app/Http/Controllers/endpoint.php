<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class endpoint extends Controller
{
    public function Metodoget(){
         
        $asignaturas=["Cliente ", "Interfaces ", "Despliegue ", "Servidor ", "Ingles"];

        return response()->json(['mensaje'=>'Estas son las asignaturas', 'datos'=> $asignaturas]);
    }

    
}
