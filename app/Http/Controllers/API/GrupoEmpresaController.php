<?php

namespace App\Http\Controllers\API;

use App\Models\GrupoEmpresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrupoEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      return GrupoEmpresa::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $grupoEmpresa = new GrupoEmpresa();
      $grupoEmpresa->nombreCorto = $request->nombreCorto;
      $grupoEmpresa->nombreLargo = $request->nombreLargo;
      $grupoEmpresa->fecha       = $request->fecha;
      $grupoEmpresa->tipoSociedad = $request->tipoSociedad;
      $grupoEmpresa->save();
      return response()->json([
        "sePudo" => True
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
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
      $grupoEmpresa->save();
      return response()->json([
        "sePudo" => True
      ]);
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
