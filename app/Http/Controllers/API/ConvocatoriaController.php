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
      $nuevaConv->validoHasta = $request->validoHasta;
      $pdf = $request->file('archivo');
      if($pdf !== null){
        $path = $pdf->store('public/files');
        $nuevaConv->pdfPath = $path;
      }
      $nuevaConv->save();
      return response()->json([
        'message'=>'Se ha creado una convocatoria.',
        'data' => $nuevaConv
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
      $conv = Convocatoria::find($id);
      return $conv;
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
     * Retorna el archivo con respecto a este recurso, en convocatoria es el pdf (IPTIS)
     */
    public function getArchivo($id){
      $convocatoria = Convocatoria::find($id);
      return response()->download(storage_path('app/'.$convocatoria->pdfPath));
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
