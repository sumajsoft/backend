<?php

use App\Http\Controllers\API\ConvocatoriaController;
use App\Http\Controllers\API\GrupoEmpresaController;
use App\Http\Controllers\API\PliegoController;
use App\Models\Convocatoria;
use App\Models\GrupoEmpresa;
use App\Models\Pliegos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('convocatorias', [ConvocatoriaController::class,'index']);
Route::get('convocatorias/{id}',[ConvocatoriaController::class,'show']);
Route::get('convocatorias/file/{id}',[ConvocatoriaController::class,'getArchivo']);
Route::post('convocatorias',[ConvocatoriaController::class,'store']);
Route::post('convocatorias/{id}', [ConvocatoriaController::class,'update']);

Route::get('grupo-empresas', [GrupoEmpresaController::class,'index']);
Route::get('grupo-empresas/{id}', [GrupoEmpresaController::class,'show']);
Route::get('grupo-empresas/file/{id}',[GrupoEmpresaController::class,'getArchivo']);
Route::post('grupo-empresas',[GrupoEmpresaController::class,'store']);
Route::post('grupo-empresas/{id}', [GrupoEmpresaController::class,'update']);

Route::get('convocatorias-no-publicadas', [ConvocatoriaController::class,'nopublicadas']);
Route::get('convocatoriaspublicar/{id}', [ConvocatoriaController::class,'publicarConvocatoria']);
Route::get('convocatorias-publicadas', [ConvocatoriaController::class,'publicadas']);

Route::get('pliegos', [PliegoController::class,'index']);
Route::get('pliegos/{id}',[PliegoController::class,'show']);
Route::get('pliegos/file/{id}',[PliegoController::class,'getArchivo']);
Route::post('pliegos',[PliegoController::class,'store']);
Route::post('pliegos/{id}', [PliegoController::class,'update']);

Route::get('pliegos-no-publicados', [PliegoController::class,'pliegosNoPublicados']);
Route::get('pliegos-publicados', [PliegoController::class,'pliegosPublicados']);
Route::get('publicarpliegos/{id}', [PliegoController::class,'publicarPliego']);