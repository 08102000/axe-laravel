<?php

namespace App\Http\Controllers\AXE;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class correosController extends Controller


{
      public function correos()
    {
        // Obtener los datos de personas desde el controlador PersonasController
        $personasController = new PersonasController();
        $personas = Http::get('http://localhost:4000/personas');
        $personasArreglo = json_decode($personas,true);
       
        // Obtener los datos de teléfonos
        $correos = Http::get('http://localhost:4000/correos');
        $correosArreglo = json_decode($correos, true);
       
        // Retornar la vista con ambos conjuntos de datos
        return view('AXE.correos', compact('personasArreglo', 'correosArreglo'));
    }
   

    public function nuevo_correo(Request $request ){
    $nuevo_correo = Http::post('http://localhost:4000/nuevo_correo',[
        
    "COD_PERSONA" => $request->input("COD_PERSONA"),
    "CORREO_ELECTRONICO"=> $request->input("CORREO_ELECTRONICO"),
    
        ]);
        //dd($request->input("COD_PERSONA"));
        return redirect('/correos');
    }

    public function modificar_correo(Request $request ){
       
        $modificar_correo = Http::put('http://localhost:4000/modificar_correo/'.$request->input("COD_CORREO"),[
            "COD_CORREO" => $request->input("COD_CORREO"),
        
            "CORREO_ELECTRONICO"=> $request->input("CORREO_ELECTRONICO"),
            

        ]);
      

        return redirect('/correos');
    }

}