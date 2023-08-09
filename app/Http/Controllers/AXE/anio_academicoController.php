<?php

namespace App\Http\Controllers\AXE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class anio_academicoController extends Controller
{
    public function anio_academico(){
       $anio_academico = Http::get('http://localhost:3000/SELanio_academico/');
       $anio_academico_Arreglo = json_decode($anio_academico,true);
       //return $reservaciones;
       return view('AXE.anio_academico', compact('anio_academico_Arreglo'));
       
    }
   /* // de aqui
    public function del($cod){
        $del = Http::delete('http://localhost:3000/del/'.$cod);
        return redirect('/ControlM');
    }
    // hasta aqui*/

    public function nuevo_anio_academico(Request $request ){
        //print_r([$request->input("nombre"),$request->input("fecha"),$request->input("registro"),$request->input("codigo")]);die();
        $nuevo_anio_academico = Http::post('http://localhost:3000/INSanio/',[
        "descripcion" => $request->input("descripcion"),
        ]);
        return redirect('/anio_academico');
    }

    public function modificar_anio_academico(Request $request ){
        //print_r([$request->input("id"),$request->input("formato"),$request->input("servicios"),$request->input("tipo")]);die();
        $modificar_anio_academico = Http::put('http://localhost:3000/UPDanio/'.$request->input("COD_ANIO_ACADEMICO"),[
        "COD_ANIO_ACADEMICO"=> $request->input("COD_ANIO_ACADEMICO"),
        "descripcion" => $request->input("descripcion"),
        ]);
       //print_r([$putformatos]);die();

        return redirect('/anio_academico');
    }


}