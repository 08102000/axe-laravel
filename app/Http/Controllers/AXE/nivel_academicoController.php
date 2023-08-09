<?php

namespace App\Http\Controllers\AXE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class nivel_academicoController extends Controller
{
    public function nivel_academico(){
       $nivel_academico = Http::get('http://localhost:3000//nivel_academico');
       $nivel_academico_Arreglo = json_decode($nivel_academico,true);
       //return $reservaciones;
       return view('AXE.nivel_academico', compact('nivel_academico_Arreglo'));
       
    }
   /* // de aqui
    public function del($cod){
        $del = Http::delete('http://localhost:3000/del/'.$cod);
        return redirect('/ControlM');
    }
    // hasta aqui*/

    public function nuevo_nivel_academico(Request $request ){
        //print_r([$request->input("nombre"),$request->input("fecha"),$request->input("registro"),$request->input("codigo")]);die();
        $nuevo_nivel_academico = Http::post('http://localhost:3000//nuevo_nivel',[
        "descripcion" => $request->input("descripcion"),
        ]);
        return redirect('/nivel_academico');
    }

    public function modificar_nivel_academico(Request $request ){
        //print_r([$request->input("id"),$request->input("formato"),$request->input("servicios"),$request->input("tipo")]);die();
        $modificar_nivel_academico = Http::put('http://localhost:3000//nivel_academico/'.$request->input("COD_NIVEL_ACADEMICO"),[
        "COD_NIVEL_ACADEMICO"=> $request->input("COD_NIVEL_ACADEMICO"),
        "descripcion" => $request->input("descripcion"),
        ]);
       //print_r([$putformatos]);die();

        return redirect('/nivel_academico');
    }


}