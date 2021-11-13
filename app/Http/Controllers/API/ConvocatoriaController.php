<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Convocatoria;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Convocatoria::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $nuevaConv = new Convocatoria();
      $nuevaConv->titulo = $request->titulo;
      $nuevaConv->codigo = $request->codigo;
      $nuevaConv->semestre = $request->semestre;
      $nuevaConv->gestion = $request->gestion;
      $nuevaConv->archivo = $request->archivo;
      $nuevaConv->save();
      return response()->json([
        'sePudo' => True
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      $conv = Convocatoria::find($id);
      $conv->titulo = $request->titulo;
      $conv->codigo = $request->codigo;
      $conv->semestre = $request->semestre;
      $conv->gestion = $request->gestion;
      $conv->archivo = $request->archivo;
      $conv->save();
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
    public function destroy($id)
    {
        //
    }
}
