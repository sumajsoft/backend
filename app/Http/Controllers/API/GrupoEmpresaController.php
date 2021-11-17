<?php

namespace App\Http\Controllers\API;

use App\Models\GrupoEmpresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
      $nombreCorto = $request->nombreCorto;
      $geBusc = GrupoEmpresa::where('nombreCorto','=',$nombreCorto)->first();
      if(isset($geBusc)){
        return response()->json([
          "message"=>"Ya existe una Grupo empresa con el mismo nombre"
        ]);
      }
      else{
        $grupoEmpresa = new GrupoEmpresa();
        $grupoEmpresa->nombreCorto = $request->nombreCorto;
        $grupoEmpresa->nombreLargo = $request->nombreLargo;
        $grupoEmpresa->fecha       = $request->fecha;
        $grupoEmpresa->tipoSociedad = $request->tipoSociedad;
        $logo = $request->file('archivo');
        if($logo !== null){
          $path = $logo->store('public/files');
          $grupoEmpresa->logoPath = $path;
        }
        $grupoEmpresa->save();
        return response()->json([
          "message" => "Se ha creado una nueava Grupo Empres"a
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
      $grupoEmpresa->nombreCorto = $request->nombreCorto;
      $grupoEmpresa->nombreLargo = $request->nombreLargo;
      $grupoEmpresa->fecha = $request->fecha;
      $grupoEmpresa->tipoSociedad = $request->tipoSociedad;
      $grupoEmpresa->direccion = $request->direccion;
      $grupoEmpresa->email = $request->email;
      $grupoEmpre1sa->telefono = $request->telefono;
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
      if($logo !== null){
        $path = $logo->store('public/files');
        $grupoEmpresa->logoPath = $path;
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
