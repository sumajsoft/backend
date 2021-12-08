<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Convocatoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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

    public function nopublicadas(){
      $convocatoria = \DB::table('convocatoria')//->select('titulo','codigo','semestre','pdfPath')
                        ->where('fechaPublicacion',null)
                        ->select('titulo','codigo','semestre','pdfPath')
                        ->orderBy('created_at','DESC')
                        ->paginate(10);
        return response()->json($convocatoria, 200);

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
      $nuevaConv->fechaPublicacion = $request->fechaPublicacion;
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
      if(isset($request->titulo)){
        $conv->titulo = $request->titulo;
      }
      if(isset($request->codigo)){
        $conv->codigo = $request->codigo;
      }
      if(isset($request->semestre)){
        $conv->semestre = $request->semestre;
      }
      if(isset($request->gestion)){
        $conv->gestion = $request->gestion;
      }
      if(isset($request->gestion)){
        $conv->fechaPublicacion = $request->fechaPublicacion;
      }
      $pdf = $request->file('archivo');
      if(isset($pdf)){
        $lastPath = $conv->pdfPath;
        if(Storage::exists($lastPath)){
          Storage::delete($lastPath);
          $newPath = $pdf->store('public/files');
          $conv->pdfPath = $newPath;
        }
        else{
          $path = $pdf->store('public/files');
          $conv->pdfPath = $path;
        }
      }
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
      if(Storage::exists($convocatoria->pdfPath)){
        return response()->download(storage_path('app/'.$convocatoria->pdfPath));
      }
      else{
        return response()->json(['message'=>"No existe el archivo especificado"]);
      }
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
