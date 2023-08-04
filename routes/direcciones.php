<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AXE\direccionesController;

Route::get('',[direccionesController::class,'direcciones']);
//de aqui 
Route::post('/insertar',[direccionesController::class,'nueva_direccion']);
Route::post('/actualizar',[direccionesController::class,'modificar_direccion']);
//hasta aqui