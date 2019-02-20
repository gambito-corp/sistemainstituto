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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
}
