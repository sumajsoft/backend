<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pliego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PliegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pliego::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevopliego = new Pliego();
        $nuevopliego->titulo = $request->titulo;
        $nuevopliego->codigo = $request->codigo;
        $nuevopliego->semestre = $request->semestre;
        $nuevopliego->gestion = $request->gestion;
        $nuevopliego->fechaPublicacion = $request->fechaPublicacion;
        $pdf = $request->file('archivo');
        if($pdf !== null){
            $path = $pdf->store('public/files');
            $nuevopliego->pdfPath = $path;
        }
        $nuevopliego->save();
        return response()->json([
            'message'=>'Se ha registrado un nuevo Pliego de Especificaciones.',
            'data' => $nuevopliego
        ]);
    }

    public function pliegosNoPublicados(){
        $pliego = \DB::table('pliego')
                          ->where('fechaPublicacion',null)
//                          ->select('titulo','codigo','semestre','pdfPath','fechaPublicacion')
                          ->orderBy('created_at','DESC')
                           ->paginate(10);
        return response()->json($pliego, 200);
      }

      public function pliegosPublicados(){
        $pliego = \DB::table('pliego')
                          ->whereNotNull('fechaPublicacion')
//                          ->select('titulo','codigo','semestre','pdfPath','fechaPublicacion')
                          ->orderBy('created_at','DESC')
                          ->get();
          return response()->json([
            'data' => $pliego
          ]);
      }

       /**
          * @return \Illuminate\Http\Response
          * @param  int  $id
          * @param  \Illuminate\Http\Request  $request
       */
      /*public function publicarPliego(Request $request, $id){
        $pliego = Pliego::find($id);
        $pliego->save();
        return response()->json([
          "publicado" => True
        ]);
      }*/

      /**
        * @return \Illuminate\Http\Response
        * @param  int  $id
        * @param  \Illuminate\Http\Request  $request
     */

      public function publicarPliego(Request $request, $id){
        $pliego = Pliego::find($id);
        $properties = array("titulo");
        foreach ($properties as &$item) {
            error_log('$item');
            error_log($pliego[$item]);
            if (is_null($pliego[$item])) {
              return response()->json([
                 'message' => "no se puede publicar este pliego, se requiere el dato: '{$item}'"
              ], 400);
            }
        }
        $now = Carbon::now('UTC');
        $pliego->fechaPublicacion= $now->toDateTimeString();
        $pliego->save();
        return response()->json([
          "message" => 'se ha publicado un pliego',
            "data" => $pliego
        ], 200);
      }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pliego = Pliego::find($id);
        return $pliego;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pliego = Pliego::find($id);
      if(isset($request->titulo)){
        $pliego->titulo = $request->titulo;
      }
      if(isset($request->codigo)){
        $pliego->codigo = $request->codigo;
      }
      if(isset($request->semestre)){
        $pliego->semestre = $request->semestre;
      }
      if(isset($request->gestion)){
        $pliego->gestion = $request->gestion;
      }
      if(isset($request->gestion)){
        $pliego->fechaPublicacion = $request->fechaPublicacion;
      }
      $pdf = $request->file('archivo');
      if(isset($pdf)){
        $lastPath = $pliego->pdfPath;
        if(Storage::exists($lastPath)){
          Storage::delete($lastPath);
          $newPath = $pdf->store('public/files');
          $pliego->pdfPath = $newPath;
        }
        else{
          $path = $pdf->store('public/files');
          $pliego->pdfPath = $path;
        }
      }
      $pliego->save();
      return response()->json([
        "seRealizo" => True
      ]);
    }

    public function getArchivo($id){
        $pliego = Pliego::find($id);
        if(Storage::exists($pliego->pdfPath)){
          return response()->download(storage_path('app/'.$pliego->pdfPath));
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
