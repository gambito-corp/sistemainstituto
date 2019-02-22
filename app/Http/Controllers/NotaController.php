<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Carrera;
use App\Curso;
use App\Ciclo;
use App\Periodo;
class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    $this->middleware('auth');
    }
    public function index($id)
    {
          $notas =DB::table('notas')
          ->where('notas.ciclo_id','=',$id)
          ->get();
        return view('notas.index', ['notas' => $notas]);
    }
    public function mostrarnotas()
    {
         $notas = nota::all();
         return view('notas.editar', ['notas' => $notas]);
    }
      public function notasid($id)
    {   
            $notas = DB::table('notas')
             ->where('notas.ciclo_id','=',$id)
          ->get();
         return view('notas.nota-alumno', ['notas' => $notas]);
    }
     public function editarnotas(Request $request)
    {   
     
        $validate = $this->validate($request,[
        'id' => 'required|int',    
        'nota1' => 'required|string|max:4',
        'nota2' => 'required|string|max:4',
        'nota3' => 'required|string|max:4',
        'nota4' => 'required|string|max:4',
        'nota5' => 'required|string|max:4',
        'nota6' => 'required|string|max:4',
        'nota7' => 'required|string|max:4',
        'nota8' => 'required|string|max:4',
       ]);
        die();
        $id = $request->input('id');

        $nota1 = $request->input('nota1');
        $nota2 = $request->input('nota2');
        $nota3 = $request->input('nota3');
        $nota4 = $request->input('nota4');
        $nota5 = $request->input('nota5');
        $nota6 = $request->input('nota6');
        $nota7 = $request->input('nota7');
        $nota8 = $request->input('nota8');

        $notas =nota::find($id);
        $notas->nota1 = $nota1;
        $notas->nota2 = $nota2;
        $notas->nota3 = $nota3;
        $notas->nota4 = $nota4;
        $notas->nota5 = $nota5;
        $notas->nota6 = $nota6;
        $notas->nota7 = $nota7;
        $notas->nota8 = $nota8;
        $update=$notas->update();

        $notas = DB::table('notas')
             ->where('notas.ciclo_id','=',$id)
          ->get();

        if($update)
        {
        return view('notas.nota-alumno', ['notas' => $notas])->with(['message'=>'Actualizado correctamente']);
        }else {
        return view('notas.nota-alumno', ['notas' => $notas])->with(['message'=>'Ocurrio un problema al Actualizar ']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
  
}
