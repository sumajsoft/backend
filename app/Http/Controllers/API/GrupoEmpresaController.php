<?php

namespace App\Http\Controllers\API;

use App\Models\GrupoEmpresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GrupoEmpresaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $grupoEmpresas = GrupoEmpresa::all();
      return $grupoEmpresas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $nombreCorto = strtolower($request->nombreCorto);
      $geBusc = GrupoEmpresa::where('nombreCorto','=',$nombreCorto)->first();
      if(isset($geBusc)){
        return response()->json([
          "message"=>"Ya existe una Grupo empresa con el mismo nombre"
        ]);
      }
      else{
        $grupoEmpresa = new GrupoEmpresa();
        $grupoEmpresa->nombreCorto = $nombreCorto;
        $grupoEmpresa->nombreLargo = $request->nombreLargo;
        $grupoEmpresa->fechaCreacion= $request->fechaCreacion;
        $grupoEmpresa->tipoSociedad = $request->tipoSociedad;
        $logo = $request->file('archivo');
        if($logo !== null){
          $path = $logo->store('public/files');
          $grupoEmpresa->logoPath = $path;
        }
        return response()->json([
          "message" => "Se ha creado una nueava Grupo Empresa"
        ]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
      return GrupoEmpresa::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      $grupoEmpresa = GrupoEmpresa::find($id);
      if(isset($request->direccion)){
        $grupoEmpresa->direccion = $request->direccion;
      }
      if(isset($request->email)){
        $grupoEmpresa->email = $request->email;
      }
      if(isset($request->telefono)){
        $grupoEmpresa->telefono = $request->telefono;        
      }
      if(isset($request->nombreSocio1)){
        $grupoEmpresa->nombreSocio1 = $request->nombreSocio1;
      }
      if(isset($request->nombreSocio2)){
        $grupoEmpresa->nombreSocio2 = $request->nombreSocio2;
      }
      if(isset($request->nombreSocio3)){
        $grupoEmpresa->nombreSocio3 = $request->nombreSocio3;
      }
      if(isset($request->nombreSocio4)){
        $grupoEmpresa->nombreSocio4 = $request->nombreSocio4;
      }
      if(isset($request->nombreSocio5)){
        $grupoEmpresa->nombreSocio5 = $request->nombreSocio5;
      }
      $logo = $request->file('archivo');
      if(isset($logo)){
        $lastPath = $grupoEmpresa->logoPath;
        if(Storage::exists($lastPath)){
          Storage::delete($lastPath);
          $path = $logo->store('public/files');
          $grupoEmpresa->logoPath = $path;
        }
        else{
          $path = $logo->store('public/files');
          $grupoEmpresa->logoPath = $path;
        }
      }
      $grupoEmpresa->save();
      return response()->json([
        "sePudo" => True
      ]);
    }

    /**
     * Retorna el archivo de una GrupoEmpresa en este caso su logo
     */
    public function getArchivo($id){
      $ge = GrupoEmpresa::find($id);
      return response()->download(storage_path('app/'.$ge->logoPath));
    }

    /**
     * Retorna un response con message y verificar si el nombre corto en el req ya existe o no
     */
    public function verificarNombreCorto(Request $request){
      $nombreCorto = strtolower($request->nombreCorto);
      $buscado = GrupoEmpresa::where('nombreCorto',$nombreCorto)->first();
      if(isset($buscado)){
        return response()->json([
          "message"=>"Nombre corto no disponible"
        ]);
      }
      else{
        return response()->json([
          "message"=>"Nombre corto disponible"
        ]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    }
}
