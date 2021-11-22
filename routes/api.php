<?php

use App\Http\Controllers\API\ConvocatoriaController;
use App\Http\Controllers\API\GrupoEmpresaController;
use App\Models\Convocatoria;
use App\Models\GrupoEmpresa;
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
Route::put('grupo-empresas/{id}', [GrupoEmpresaController::class,'update']);