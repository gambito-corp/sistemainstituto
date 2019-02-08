<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use App\Carrera;
use App\Ciclo;
use App\Curso;
Use Illuminate\Support\Facades\File;
Use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
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
     
    public function index()
    {
         $documentos = Documento::all();
        return view('documentos.index', [
            'documentos' => $documentos
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = carrera::all();
        $ciclos = ciclo::all();
        $cursos = curso::all();
        return view('documentos.create', ['carreras' => $carreras, 'ciclos' => $ciclos, 'cursos' => $cursos ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
         'carrera_id' => 'required|int',
         'curso_id' => 'required|int',
         'ciclo_id' => 'required|int',
         'nombre' => 'required|string|max:50',
       ]);
        // Subir la imagen
        $foto = $request-> file('archivo');
        if($foto)
        {
        //Poner nombre unico
            $foto_full = time().$foto->getClientOriginalName();
        //Guardar la foto en la carpeta (storage/app/users)
            Storage::disk('documentos')->put($foto_full, File::get($foto));
        }
        
       $documento=documento::create($request->all());

        if($documento)
        {
        return redirect()->route('Documentos.index')->with(['message'=>'Documento agregado correctamente']);
        }else {
        return redirect()->route('Documentos.index')->with(['message'=>'Ocurrio un problema al guardar el Documento']);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carreras = carrera::all();
        $ciclos = ciclo::all();
        $cursos = curso::all();
        $documentos = documento::find($id);
            return view('Documentos.edit',['documentos' => $documentos, 'carreras' => $carreras, 'ciclos' => $ciclos, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documentos =documento::find($id);
         if($documentos)
            {
            $documentos->delete();
            return redirect()-> route('Documentos.index')->with(['message'=>'Documento eliminado correctamente']);
            }
            else{
            return redirect()-> route('Documentos.index')->with(['message'=>'Ocurrio un error al eliminar el Documento']);
            }
    }
}
