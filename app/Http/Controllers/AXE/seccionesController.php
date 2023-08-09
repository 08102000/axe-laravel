<?php

namespace App\Http\Controllers\AXE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class seccionesController extends Controller
{
    public function secciones(){
       $secciones = Http::get('http://localhost:3000/Secciones/');
       $seccionesArreglo = json_decode($secciones,true);
       //return $reservaciones;
       return view('AXE.secciones', compact('seccionesArreglo'));
       
    }
   /* // de aqui
    public function del($cod){
        $del = Http::delete('http://localhost:3000/del/'.$cod);
        return redirect('/ControlM');
    }
    // hasta aqui*/

    public function nueva_seccion(Request $request ){
        //print_r([$request->input("nombre"),$request->input("fecha"),$request->input("registro"),$request->input("codigo")]);die();
        $nueva_seccion = Http::post('http://localhost:3000/nueva_seccion/',[
        "DESCRIPCION_SECCIONES" => $request->input("DESCRIPCION_SECCIONES"),
        ]);
        return redirect('/secciones');
    }

    public function modificar_seccion(Request $request ){
        //print_r([$request->input("id"),$request->input("formato"),$request->input("servicios"),$request->input("tipo")]);die();
        $modificar_seccion = Http::put('http://localhost:3000/Secciones/'.$request->input("COD_SECCIONES"),[
        "COD_SECCIONES"=> $request->input("COD_SECCIONES"),
        "DESCRIPCION_SECCIONES" => $request->input("DESCRIPCION_SECCIONES"),
        ]);
       //print_r([$putformatos]);die();

        return redirect('/secciones');
    }


}