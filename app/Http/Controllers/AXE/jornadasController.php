<?php

namespace App\Http\Controllers\AXE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class jornadasController extends Controller
{
    public function jornadas(){
       $jornadas = Http::get('http://localhost:3000/jornadas/');
       $jornadasArreglo = json_decode($jornadas,true);
       //return $reservaciones;
       return view('AXE.jornadas', compact('jornadasArreglo'));
       
    }
   /* // de aqui
    public function del($cod){
        $del = Http::delete('http://localhost:3000/del/'.$cod);
        return redirect('/ControlM');
    }
    // hasta aqui*/

    public function nueva_jornada(Request $request ){
        //print_r([$request->input("nombre"),$request->input("fecha"),$request->input("registro"),$request->input("codigo")]);die();
        $nueva_jornada = Http::post('http://localhost:3000/jornadas/',[
        "DESCRIPCION_JOR" => $request->input("DESCRIPCION_JOR"),
        ]);
        return redirect('/jornadas');
    }

    public function modificar_jornada(Request $request ){
        //print_r([$request->input("id"),$request->input("formato"),$request->input("servicios"),$request->input("tipo")]);die();
        $modificar_jornada = Http::put('http://localhost:3000/jornadas/'.$request->input("COD_JORNADA"),[
        "COD_JORNADA"=> $request->input("COD_JORNADA"),
        "DESCRIPCION_SECCIONES" => $request->input("DESCRIPCION_SECCIONES"),
        ]);
       //print_r([$putformatos]);die();

        return redirect('/jornadas');
    }


}