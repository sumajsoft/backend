<?php

use App\Http\Controllers\API\ConvocatoriaController;
use App\Http\Controllers\API\GrupoEmpresaController;
use App\Models\Convocatoria;
use App\Models\GrupoEmpresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
/*
Route::post('login',function(Request $request){
  $username = $request->username;
  $password = $request->password;
  $user = User::where('username','=',$username)->first();
  if(isset($user)){
    if($user->password == $password){
      $role = $user->role;
      return response()->json([
        "message"=>"Inicio de sesion hecho",
        "username"=>$username,
        "role"=>$role
      ]);
    }
    else{
      return response()->json([
        "message"=>"Contrasenha del usuario ".$username." incorrecta"
      ]);
    }
  }
  else{
    return response()->json([
      "message" => "Nombre de usuario o contrasenha incorrectos"
    ]);
  }
});
*/

Route::get('convocatorias/{id}',[ConvocatoriaController::class,'show']);
Route::get('convocatorias/file/{id}',[ConvocatoriaController::class,'getArchivo']);
Route::post('convocatorias',[ConvocatoriaController::class,'store']);
Route::post('convocatorias/{id}', [ConvocatoriaController::class,'update']);

Route::get('grupo-empresas', [GrupoEmpresaController::class,'index']);
Route::get('grupo-empresas/{id}', [GrupoEmpresaController::class,'show']);
Route::get('grupo-empresas/file/{id}',[GrupoEmpresaController::class,'getArchivo']);
Route::post('grupo-empresas',[GrupoEmpresaController::class,'store']);
Route::post('grupo-empresas/{id}', [GrupoEmpresaController::class,'update']);

Route::post('verificar-nombreCorto',[GrupoEmpresaController::class,'verificarNombreCorto']);

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);
Route::get('convocatorias', [ ConvocatoriaController::class,'index']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);

});
