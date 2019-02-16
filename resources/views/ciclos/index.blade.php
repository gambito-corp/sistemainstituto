@extends('layouts.app')
@section('contenido')
<div class="col-md-12 ">
      <a href="{{ route('Ciclos.create') }}" class="btn btn-info mb-3">Agregar Ciclo</a>
    <div class="panel-body">

        <table class="table table-bordered" id="miTabla">

            <thead>
            <th class="text-center">Carrera</th>
            <th class="text-center">Curso</th>
            <th class="text-center">Ciclo</th>
            <th class="text-center">Notas</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            </thead>
            <tbody>
                @forelse($ciclos as $ciclo)
                <tr>
                    <td class="text-center">{{ $ciclo->carreranombre }}</td>
                    <td class="text-center">{{ $ciclo->cursonombre }}</td>
                    <td class="text-center">{{ $ciclo->ciclonombre }}</td>
                    <td class="text-center"></td>
                    <td class="text-center"><a href="{{ route('Ciclos.edit', $ciclo->id) }}" class="btn btn-success">Editar</a></td>
                    
                    <td class="text-center"><form action="{{ route('Ciclos.destroy', $ciclo->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">eliminar</button>
                    </form>
                    </td>
                </tr>
                @empty
            <h2>Añade tu ciclos</h2>
            @endforelse
            </tbody>
        </table>
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>
@endsection
