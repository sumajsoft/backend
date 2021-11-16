<?php

use App\Http\Controllers\API\ConvocatoriaController;
use App\Http\Controllers\API\GrupoEmpresaController;
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
Route::post('convocatorias',[ConvocatoriaController::class,'store']);
Route::put('convocatorias/{id}', [ConvocatoriaController::class,'update']);

Route::get('grupo-empresas', [GrupoEmpresaController::class,'index']);
Route::post('grupo-empresas',[GrupoEmpresaController::class,'store']);
Route::put('grupo-empresas/{id}', [GrupoEmpresaController::class,'update']);